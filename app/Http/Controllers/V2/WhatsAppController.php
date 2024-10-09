<?php

namespace App\Http\Controllers\V2;

use App\Core\WhatsAppApi;
use App\Http\Controllers\Controller;
use App\Imports\WhatsAppBlastImport;
use App\WhatsAppBlastMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class WhatsAppController extends Controller
{
    protected $apiService;

    /**
     * Constructor untuk meng-inject ApiService.
     */
    public function __construct(WhatsAppApi $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Initialize
        $datas = WhatsAppBlastMessage::latest()->paginate(20);

        return view('pages.broadcast.whatsapp.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.broadcast.whatsapp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message'   => 'required',
            'document'  => 'required|mimes:xlsx',
            'file'      => 'nullable|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->first())->withInput();
        }

        try {
            // Initialize
            $message    = request('message');
            $document   = request('document');
            $fileType   = request('file_type');
            $file       = request('file');

            Excel::import(new WhatsAppBlastImport($message, $document, $fileType, $file), $request->file('document')->store('files/wa'));

            return redirect()->route('wa_blast')->withSuccess('Berhasil menambahkan data.');
        } catch (\Exception $th) {
            return back()->withErrors($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check Data
        $data = WhatsAppBlastMessage::where('id', $id)->first();

        if (!$data) {
            return apiResponse(false, 'Data tidak ditemukan.', '', 404);
        }

        $data->delete();

        return apiResponse(true, 'Pesan berhasil dihapus.', '', 200);
    }

    public function downloadTemplate(Request $request)
    {
        // Initialize
        $media = 'File WhatsApp Blast.xlsx';
        $myFile = public_path($media);

        return response()->download($myFile);
    }

    // Now Post
    public function postMessage($id)
    {
        // Check Data
        $data = WhatsAppBlastMessage::where('id', $id)->first();

        if (!$data) {
            return apiResponse(false, 'Data tidak ditemukan.', '', 404);
        }

        if ($data->file_type == null) {
            // Send Message
            $message  = [
                'to'        => $data->whatsapp_number,
                'message'   => $data->message
            ];

            $endpoint = 'https://wweb.indonesiacore.com/wa/api/send-message';

            $response = $this->apiService->post($endpoint, $message);
        } else {
            // Send Message
            $fileManager = 'storage/' . $data->path;
            $path        = file_get_contents($fileManager);

            $message  = [
                'to'        => $data->whatsapp_number,
                'message'   => $data->message
            ];

            $endpoint = 'https://wweb.indonesiacore.com/wa/api/send-message/media';

            $response = $this->apiService->post($endpoint, $message, $path, $fileManager);
        }

        if ($response['status']) {
            $data->update([
                'status'    => 1,
                'send_date' => date('Y-m-d H:i:s')
            ]);

            return apiResponse(true, 'Pesan berhasil dikirim.', '', 200);
        } else {
            $data->update([
                'status'    => 2
            ]);

            return apiResponse(false, $response['message'], '', 400);
        }
    }
}

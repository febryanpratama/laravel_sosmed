<?php

namespace App\Http\Controllers;

use App\Services\EmailServices;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    protected $emailServices;
    public function __construct(EmailServices $emailServices)
    {
        $this->emailServices = $emailServices;
    }

    public function index(Request $request){

        $param = $request->all();
        $response = $this->emailServices->getEmail($param);

        // dd($response['data']['data']);

        return view('pages.broadcast.index', [
            'response' => $response['data']['data'],
        ]);
    }

    public function create(){
        return view('pages.broadcast.email.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $listMail = explode(',', $request->list_email[0]);

        $validMail = [];
        // $email = "abc123@sdsd.com"; 
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

        foreach($listMail as $mail){
            if (preg_match($regex, $mail)) {
                $validMail[] = $mail;
            }
        }
        // dd($validMail);
        // $data = $request->all();

        $excelFile = $request->file('file');
        $filePath = $excelFile->getRealPath();
        $base64 = $this->excelToBase64($filePath);

        // dd($base64);
        

        $param = [
            'logo' => $request->logo,
            'subject' => $request->subject,
            'body' => $request->body,
            'sender' => $request->sender,
            'cc' => $request->cc,
            'bcc' => $request->bcc,
            'attachment' => $request->attachment ?? null,
            'list_email' => $validMail,
        ];


        $response = $this->emailServices->storeEmail($param);


        if(!$response['status']){
            return redirect('broadcast/email/create')->withErrors($response['message']);
        }
    
        return redirect('broadcast/email')->withSuccess('Email berhascil dikirim');
        // dd($response);
    }

    public function sendEmail($param){
        // dd($param);
        $response = $this->emailServices->sendEmail($param);

        if(!$response['status']){
            return redirect('broadcast/email')->withErrors($response['message']);
        }

        return back()->withSuccess($response['message']);
    }

    public function excelToBase64($filePath) {
        // Check if file exists
        if (!file_exists($filePath)) {
            return "File not found";
        }
    
        // Read the Excel file
        $fileData = file_get_contents($filePath);
    
        // Encode the Excel file to Base64
        $base64Encoded = base64_encode($fileData);
    
        // Return the Base64 encoded string
        return $base64Encoded;
    }

    public function edit($email){
        $response = $this->emailServices->getEmailById($email);

        // dd($response['data']);
        return view('pages.broadcast.email.edit', [
            'response' => $response['data']
        ]);
    }

    public function update(Request $request)
    {
        // dd($request->all());

        // $listMail = explode(',', $request->list_email[0]);

        // $validMail = [];
        // // $email = "abc123@sdsd.com"; 
        // $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

        // foreach($listMail as $mail){
        //     if (preg_match($regex, $mail)) {
        //         $validMail[] = $mail;
        //     }
        // }
        // dd($validMail);
        // $data = $request->all();

        // $excelFile = $request->file('file');
        // $filePath = $excelFile->getRealPath();
        // $base64 = $this->excelToBase64($filePath);

        // dd($base64);
        

        $param = [
            'email' => $request->email,
            'email_id' => $request->email_id,
            'logo' => $request->logo,
            'subject' => $request->subject,
            'body' => $request->body,
            'sender' => $request->sender,
            'cc' => $request->cc,
            'bcc' => $request->bcc,
            'attachment' => $request->attachment ?? null,
        
        ];

        // dd($param);

        $endpoint = 'email/update/'.$request->email_id;


        $response = $this->emailServices->updateEmail($endpoint, $param);


        if(!$response['status']){
            return back()->withErrors($response['message']);
        }
    
        return redirect('broadcast/email')->withSuccess('Email berhasil diubah');
        // dd($response);
    }

    
}

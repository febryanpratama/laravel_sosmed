<?php

namespace App\Http\Controllers;

use App\Services\WaServices;
use Illuminate\Http\Request;

class WaController extends Controller
{
    protected $waServices;

    public function __construct(WaServices $waServices)
    {
        $this->waServices = $waServices;
    }

    public function index()
    {
        // Initialize
        $response = $this->waServices->getWa([]);

        return view('pages.broadcast.wa.index', [
            'response' => $response['data']['data'],
        ]);
    }

    public function create()
    {
        return view('pages.broadcast.wa.create');
    }

    public function store(Request $request) {}

    public function downloadTemplate(Request $request)
    {
        // Initialize
        $media = 'File WhatsApp Blast.xlsx';
        $myFile = public_path($media);

        return response()->download($myFile);
    }
}

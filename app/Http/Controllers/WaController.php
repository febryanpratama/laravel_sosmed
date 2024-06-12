<?php

namespace App\Http\Controllers;

use App\Services\WaServices;
use Illuminate\Http\Request;

class WaController extends Controller
{
    //
    protected $waServices;

    public function __construct(WaServices $waServices)
    {
        $this->waServices = $waServices;
    }

    public function index(){

        $response = $this->waServices->getWa([]);


        // dd($response);
        return view('pages.broadcast.wa.index', [
            'response' => $response['data']['data'],
        ]);
    }

    public function create(){
        return view('pages.broadcast.wa.create');
    }
}

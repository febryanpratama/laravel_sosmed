<?php

namespace App\Http\Controllers;

use App\Services\TiketServices;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    //
    protected $tiketServices;

    public function __construct(TiketServices $tiketServices){
        $this->tiketServices = $tiketServices;
    }

    public function index(){
        
        $response = $this->tiketServices->getTiket([]);

        return view('pages.tiket.index', [
            'tiket' => $response['data']
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\FarmasiServices;
use Illuminate\Http\Request;

class FarmasiController extends Controller
{
    //
    protected $farmasiServices;

    public function __construct(FarmasiServices $farmasiServices){
        $this->farmasiServices = $farmasiServices;
    }

    public function index(){
        $response = $this->farmasiServices->getListObat([]);
        return view('pages.farmasi.index', [
            'obat' => $response['data']
        ]);
    }
}

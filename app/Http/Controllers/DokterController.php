<?php

namespace App\Http\Controllers;

use App\Services\DokterServices;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    //
    protected $dokterServices;

    public function __construct(DokterServices $dokterServices){
        $this->dokterServices = $dokterServices;
    }

    public function index(){
            
        $response = $this->dokterServices->getListDokter([]);

        return view('pages.dokter.index', [
            'dokter' => $response['data']
        ]);
    }
}

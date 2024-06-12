<?php

namespace App\Http\Controllers;

use App\Services\PendaftaranServices;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    //
    protected $pendaftaranServices;
    public function __construct(PendaftaranServices $pendaftaranServices){
        $this->pendaftaranServices = $pendaftaranServices;
    }

    public function index(){

        // dd(session('token'));
        $response = $this->pendaftaranServices->getPendaftaran([]);
        return view('pages.pendaftaran.index', [
            'data' => $response['data']
        ]);
    }

    public function create(){
        $responsePenunjang = $this->pendaftaranServices->getPenunjangList([]);
        $responseDokter = $this->pendaftaranServices->getResponseDokter([]);
        return view('pages.pendaftaran.create', [
            'dataPenunjang' => $responsePenunjang['data'],
            'dataDokter' => $responseDokter['data']
        ]);
    }

    public function store(Request $request){
        $response = $this->pendaftaranServices->storePendaftaran($request->all());

        if($response['status']){
            return redirect('pendaftaran')->withSuccess($response['message']);
        }else{
            return back()->withErrors($response['message']);
        }
    }
}

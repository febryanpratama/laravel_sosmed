<?php

namespace App\Http\Controllers;

use App\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KontenController extends Controller
{
    //

    public function index(){
        $data = Konten::get();
        return view('pages.konten.index', [
            'data' => $data
        ]);
    }

    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'caption' => 'required',
            'foto' => 'required',
            'list' => 'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors()->first());
        }

        if($request->foto){
            $image = $request->file('foto');
            $image_name = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }

        $implode = implode(',', $request->list);

        if($request->tanggal && $request->waktu){
            $date_jadwal = $request->tanggal." ".$request->waktu;
        }else{
            $date_jadwal = null;
        
        }

        Konten::create([
            'caption' => $request->caption,
            'image' => $image_name,
            'app' => $implode,
            'url' => null,
            'date_jadwal' => $date_jadwal ?? null,
            'status_post' => $date_jadwal != null ? 'Terjadwal' : 'Instan',
            'status_posting' => $date_jadwal != null ? 'Menunggu' : 'Berhasil'
        ]);

        return back()->withSuccess('Data berhasil ditambahkan');
    }
}

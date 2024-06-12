<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //

    public function index(){
        $data = Account::get();
        return view('pages.account.index', [
            'data'=>$data
        ]);
    }

    public function store(Request $request){
        
        Account::create([
            'token'=>$request->token,
            'app'=>$request->app,
            'nama_sosmed' => $request->nama_sosmed
        ]);


        return back()->withSuccess('Data berhasil disimpan');
    }
}

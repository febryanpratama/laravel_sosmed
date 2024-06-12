<?php

namespace App\Http\Controllers;

use App\Services\AuthServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    protected $authServices;

    public function __construct(AuthServices $authServices){
        $this->authServices = $authServices;
    }

    public function index(){
        return view('pages.auth.login');
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric',
            'no_rm' => 'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors()->first());
        }

        $response = $this->authServices->postLogin($request->all());
        // dd($response);

        if($response['status'] == true){
            return redirect('home')->withSuccess($response['message']);
        }else{
            return back()->withErrors($response['message']);
        }

    }

    public function register(){
        return view('pages.auth.register');
    }

    public function store(Request $request){
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric',
            'no_rm' => 'required',
            'name' => 'required',
            'no_hp' => 'required|numeric',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors()->first());
        }

        $response = $this->authServices->postRegister($request->all());

        if($response['status'] == true){
            return redirect('auth/login')->withSuccess($response['message']);
        }else{
            return back()->withErrors($response['message']);
        }

    }


    public function logout(){

        session()->forget('token');

        return redirect('auth/login');
    }
}

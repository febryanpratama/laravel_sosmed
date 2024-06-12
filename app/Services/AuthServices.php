<?php

namespace App\Services;

use App\Core\Api;

class AuthServices extends Api {
    public function postLogin($param){
        
        $api = new Api();
        $response = $api->post('auth/login', $param);
        
        // dd($response);
        if($response['status'] == true){
            session(['token' => $response['data']['token']]);
        }

        return $response;
    }

    public function postRegister($param){
        
        $api = new Api();
        $response = $api->post('auth/register', $param);
        
        // dd($response);
        // if($response['status'] == true){
        //     session(['token' => $response['data']['token']]);
        // }

        return $response;
    }
}
<?php

namespace App\Services;

use App\Core\Api;

class AuthServices extends Api {
    public function postLogin($param){
        
        // dd($param);
        $api = new Api();
        $response = $api->post('set-account', $param);
        
        // dd($response);
        if($response['status'] == true){
            session(['token' => $response['data']['token']]);
            return [
                'status' => true,
                'message' => $response['message'] ?? "Berhasil Login",
                'data' => null
            ];
        }

        return [
            'status' => false,
            'message' => $response['message'] ?? "Gagal Login",
            'data' => null
        ];


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
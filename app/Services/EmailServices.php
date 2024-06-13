<?php

namespace App\Services;

use App\Core\Api;

class EmailServices {
    public function getEmail($param){
        $api = new Api();
        $response = $api->get('email', $param);
        return $response;
    }

    public function storeEmail($param){

        $api = new Api();
        $response = $api->post('email/store', $param);
        return $response;
    }

    public function sendEmail($param){
        // dd('email/sent/'.$param);
        $api = new Api();
        $response = $api->get('email/sent/'.$param, null);
        // dd($response);
        return $response;
    }

    public function getEmailById($param){
        $api = new Api();
        $response = $api->get('email/edit/'.$param, null);
        return $response;
    }

    public function updateEmail($endpoint, $param){
        // dd($endpoint, $param);
        $api = new Api();
        $response = $api->post($endpoint, $param);

        // dd($response);
        return $response;
    }
}
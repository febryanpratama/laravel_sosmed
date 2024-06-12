<?php

namespace App\Services;

use App\Core\Api;

class PendaftaranServices {

    public function getPendaftaran($param){
        $api = new Api();
        $response = $api->get('user/pendaftaran', $param);
        // dd($response);
        return $response;
    }

    public function storePendaftaran($param){
        $api = new Api();
        $response = $api->post('user/pendaftaran', $param);
        // dd($response);
        return $response;
    }

    public function getPenunjangList($param){
        $api = new Api();
        $response = $api->get('open-api/kategori-penunjang', $param);
        // dd($response);
        return $response;
    }

    public function getResponseDokter($param){
        $api = new Api();
        $response = $api->get('user/dokter', $param);
        // dd($response);
        return $response;
    }
}
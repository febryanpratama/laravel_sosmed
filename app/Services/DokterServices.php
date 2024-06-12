<?php

namespace App\Services;

use App\Core\Api;

class DokterServices {
    public function getListDokter($param){
        $api = new Api();
        $response = $api->get('user/dokter', $param);
        // dd($response);
        return $response;
    }
}
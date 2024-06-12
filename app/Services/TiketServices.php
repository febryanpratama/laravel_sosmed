<?php

namespace App\Services;

use App\Core\Api;

class TiketServices {
    public function getTiket($param){
        $api = new Api();
        $response = $api->get('user/tiket', $param);
        // dd($response);
        return $response;
    }
}
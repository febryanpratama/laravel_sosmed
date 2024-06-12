<?php

namespace App\Services;

use App\Core\Api;

class FarmasiServices {
    public function getListObat($param){
        $api = new Api();
        $response = $api->get('user/obat', $param);
        // dd($response);
        return $response;
    }
}
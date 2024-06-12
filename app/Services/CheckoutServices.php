<?php

namespace App\Services;

use App\Core\Api;

class CheckoutServices {
    public function getObat($param){
        $api = new Api();
        $response = $api->get('user/obat/'.$param['obat_id'], $param);
        // dd($response);
        return $response;
    }
}
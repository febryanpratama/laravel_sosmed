<?php

namespace App\Services;

use App\Core\Api;

class WaServices {
    public function getWa($param){
        $api = new Api();
        $response = $api->get('whatsapp-blast', $param);
        // dd($response);
        return $response;
    }

    public function storeWa($param){

        // dd($param);

        
        $api = new Api();
        $response = $api->post('whatsapp-blast/store', $param);
        // dd($response);
        return $response;
    }
}
<?php

namespace App\Services;

use App\Core\Api;

class WaServices
{
    public function getWa($param)
    {
        // Initialize
        $api      = new Api();
        $response = $api->get('whatsapp-blast', $param);

        return $response;
    }

    public function storeWa($param)
    {
        // Initialize
        $api        = new Api();
        $response   = $api->post('whatsapp-blast/store', $param);

        dd($response, 'test');

        return $response;
    }
}

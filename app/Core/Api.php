<?php

namespace App\Core;

use Illuminate\Support\Facades\Http;

class Api {

    protected $url;

    public function __construct()
    {
        $this->url = 'https://indonesiacore.com/api/';
    }

    public function get($endpoint, $param){
        try {
            //code...
            // $url= 'https://apirs.indonesiacore.com/api/auth/login';
            $url = env('API_URL') . $endpoint;
            // dd($url);
            $data = json_encode($param);
    
            $result =  Http::withOptions(
                [
                    'verify' => false,
                ]
            )->withHeaders(
                [
                    'Content-Type' => 'application/json',
                    // 'Authorization' => 'Bearer ' . session('token') ?? null,

                ]
            )->get($url, $param);

            $resData =  json_decode($result, true);

            // dd($resData);
            if($resData['status'] == 'success'){
                return [
                    'status' => true,
                    'message' => $resData['message'],
                    'data' => $resData['data']
                ];
            }else{
                return [
                    'status' => false,
                    'message' => $resData['message'],
                    'data' => null
                ];
            }

        } catch (\Throwable $th) {
            //throw $th;

            return [
                'status' => false,
                'message' => $th->getMessage(),
                'data' => null
            ];
        }
    }
    
    public function post($endpoint, $param){

        try {
            //code...
            // $url= 'https://apirs.indonesiacore.com/api/auth/login';
            $url = env('API_URL') . $endpoint;
            // dd($url);
            $data = json_encode($param);
    
            $result =  Http::withOptions(
                [
                    'verify' => false,
                ]
            )->withHeaders(
                [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token') ?? null,

                ]
            )->post($url, $param);

            $resData =  json_decode($result, true);

            // dd($resData);
            if($resData['status'] == 'success'){
                return [
                    'status' => true,
                    'message' => $resData['message'],
                    'data' => $resData['data']
                ];
            }else{
                return [
                    'status' => false,
                    'message' => $resData['message'],
                    'data' => null
                ];
            }

        } catch (\Throwable $th) {
            //throw $th;

            return [
                'status' => false,
                'data' => $th->getMessage()
            ];
        }
    }

    public function put($endpoint, $param){
        try {
            
            $url = env('API_URL') . $endpoint;

            $data = json_encode($param);

            $result =  Http::withOptions(
                [
                    'verify' => false,
                ]
            )->withHeaders(
                [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token') ?? null,
                ]
            )->put($url, $param);

            $resData =  json_decode($result, true);

            if($resData['status'] == 'success'){
                return [
                    'status' => true,
                    'message' => $resData['message'],
                    'data' => $resData['data']
                ];
            }else{
                return [
                    'status' => false,
                    'message' => $resData['message'],
                    'data' => null
                ];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return [
                'status' => false,
                'data' => $th->getMessage()
            ];
        }
    }

    public function delete($endpoint, $param){
        try {
            
            $url = env('API_URL') . $endpoint;

            $data = json_encode($param);

            $result =  Http::withOptions(
                [
                    'verify' => false,
                ]
            )->withHeaders(
                [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token') ?? null,
                ]
            )->delete($url, $param);

            $resData =  json_decode($result, true);

            if($resData['status'] == 'success'){
                return [
                    'status' => true,
                    'message' => $resData['message'],
                    'data' => $resData['data']
                ];
            }else{
                return [
                    'status' => false,
                    'message' => $resData['message'],
                    'data' => null
                ];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return [
                'status' => false,
                'data' => $th->getMessage()
            ];
        }
    }
}
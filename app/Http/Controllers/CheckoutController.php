<?php

namespace App\Http\Controllers;

use App\Services\CheckoutServices;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    protected $checkoutServices;

    public function __construct(CheckoutServices $checkoutServices){
        $this->checkoutServices = $checkoutServices;
    }


    public function index($obat_id){

        $data = [
            'obat_id' => $obat_id
        ];

        $response = $this->checkoutServices->getObat($data);

        if($response['status']){
            return view('pages.checkout.index', [
                'obat' => $response['data']
            ]);
        }else{
            return back()->withErrors($response['message']);
        }
    }

    public function orderConfirmation($obat_id){
        $data = [
            'obat_id' => $obat_id
        ];

        $response = $this->checkoutServices->getObat($data);

        if($response['status']){
            return view('pages.checkout.order-confirmation', [
                'obat' => $response['data']
            ]);
        }else{
            return back()->withErrors($response['message']);
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Webhooks;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebhooksMetaController extends Controller
{
    private $keyAccess = 'f978ab2ecccf8fa167f0cd7169d6d128';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Initialize
        $requestData = $request->all();

        // Verifikasi token
        if ($request->input('hub.verify_token') === $this->keyAccess) {
            Webhooks::create([
                'value' => $requestData
            ]);

            // Return hub.challenge jika token valid
            return response($request->input('hub.challenge'), 200);
        } else {
            // Jika token tidak valid
            return response('Invalid token', 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

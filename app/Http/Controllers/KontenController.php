<?php

namespace App\Http\Controllers;

use App\Account;
use App\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;


class KontenController extends Controller
{
    public function index()
    {
        // Initialize
        $accounts = Account::get();
        $data     = Konten::get();

        return view('pages.konten.index', [
            'data'      => $data,
            'accounts'  => $accounts
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'caption' => 'required',
            'foto' => 'required',
            'list' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->first())->withInput();
        }

        $user = Account::where('app', $request->list)->first();

        if($request->foto){
            $image = $request->file('foto');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }

        $implode = implode(',', $request->list);

        if ($request->tanggal && $request->waktu) {
            $date_jadwal = $request->tanggal . " " . $request->waktu;
        } else {
            $date_jadwal = null;
        }

        Konten::create([
            'caption' => $request->caption,
            'image' => $image_name,
            'app' => $implode,
            'url' => null,
            'date_jadwal' => $date_jadwal ?? null,
            'status_post' => $date_jadwal != null ? 'Terjadwal' : 'Instan',
            'status_posting' => $date_jadwal != null ? 'Menunggu' : 'Berhasil'
        ]);

        if($implode == 'instagram'){
            $this->postToInstagram($user->token, url('images/'.$image_name), $request->caption);
        }else if($implode == 'twitter'){
            // $this->postToTwitter($request->access_token, $request->caption);
        }

        return back()->withSuccess('Webhook is not valid. Please check your webhook URL.');
    }

    public function postToInstagram($accessToken, $imageUrl, $caption)
    {
        $fb = new Facebook([
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => 'v12.0',
        ]);

        try {
            $response = $fb->post('/me/media', [
                'image_url' => $imageUrl,
                'caption' => $caption,
            ], $accessToken);

            $mediaId = $response->getGraphNode()['id'];

            // Publish the media
            $fb->post('/me/media_publish', [
                'creation_id' => $mediaId,
            ], $accessToken);
            
        } catch(FacebookResponseException $e) {
            // Handle error

            dd($e);
        } catch(FacebookSDKException $e) {
            // Handle error
            dd($e);
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Account;
use App\FieldsInstagram;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProviderTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallbackTwitter()
    {
        $user = Socialite::driver('twitter')->user();

        $json = [
            'user' => [
                'uid' => $user->id,
                'nickname' => $user->nickname,
                'name' => $user->name,
                'email' => $user->email,
                'imageUrl' => $user->avatar_original,
            ],
            'token' => $user->token,
            'tokenSecret' => $user->tokenSecret,
        ];

        $account = Account::create([
            // 'user_id' => Auth::user()->id,
            'nama_sosmed' => 'twitter ' . $user->name,
            'token' => $user->token,
            'app' => 'Twitter',
            'temp_credentials' => null,
            'status' => 'Active',
            'token_serialize_tweet' => null,
            'data' => json_encode($json),
        ]);

        return redirect('account')->withSuccess('Twitter Account Connected');

        // return redirect()->route('home'); // Redirect to your desired route
    }

    // public function redirectToProviderInstagram()
    // {
    //     return Socialite::driver('instagram')->redirect();
    // }

    // public function handleProviderCallbackInstagram()
    // {
    //     $user = Socialite::driver('instagram')->user();

    //     $data = [
    //         'user' => [
    //             "uid" => $user->getId(),
    //             "nickname" => $user->getNickname(),
    //             "name" =>  $user->getName(),
    //             "firstName" => null,
    //             "lastName" => null,
    //             "email" => null,
    //             "location" => "",
    //             "description" => null,
    //             "imageUrl" => $user->getAvatar(),
    //             "token" => $user->token,
    //         ]
    //     ];

    //     $account = Account::create([
    //         'nama_sosmed' => 'instagram oauth ' . $user->getName(),
    //         'token' => $user->token,
    //         'data' => json_encode($data),
    //         'status' => 'Active',
    //         'app' => "Instagram",
    //         'token_serialize_tweet' => null,
    //         'temp_credentials' => null,
    //     ]);

    //     // TODO: Handle the authenticated user, e.g., save to database or session

    //     return redirect('account')->withSuccess("Success connect to Instagram");
    // }

    // ====== Instagram
    public function generateInstagramAuthUrl()
    {
        // Initialize
        $client_id    = env('INSTAGRAM_CLIENT_ID');
        $redirect_uri = urlencode(env('INSTAGRAM_REDIRECT_URI'));

        // Generate URL
        $authUrl = "https://www.instagram.com/oauth/authorize?enable_fb_login=0&force_authentication=1&client_id={$client_id}&redirect_uri={$redirect_uri}&response_type=code&scope=instagram_business_basic,instagram_business_manage_messages,instagram_business_manage_comments,instagram_business_content_publish";

        return response()->json(['authUrl' => $authUrl]);
    }

    public function handleCallbackInstagram(Request $request)
    {
        // Initialize
        $code              = $request->code;
        $getTemporaryToken = $this->getTemporaryToken($code);

        if ($getTemporaryToken['status']) {
            // Get Long-Term Token
            $getLongTerm = $this->getLongTerm($getTemporaryToken['access_token']);

            if ($getLongTerm['status']) {
                Account::create([
                    'nama_sosmed'           => '-',
                    'token'                 => $getLongTerm['access_token'],
                    'status'                => 'Inactive',
                    'app'                   => "Instagram",
                    'token_serialize_tweet' => null,
                    'temp_credentials'      => null
                ]);

                return redirect()->route('account.index')->withSuccess($getLongTerm['message']);
            } else {
                return redirect()->route('account.index')->withSuccess($getLongTerm['message']);
            }
        } else {
            return redirect()->route('account.index')->withSuccess($getTemporaryToken['message']);
        }
    }

    private function getTemporaryToken($code)
    {
        $response = Http::asForm()->post('https://api.instagram.com/oauth/access_token', [
            'client_id'     => env('INSTAGRAM_CLIENT_ID'),
            'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => env('INSTAGRAM_REDIRECT_URI'),
            'code'          => $code
        ]);

        // Response dari Instagram API
        $data = $response->json();

        if ($response->successful()) {
            $accessToken = $data['access_token'];

            return [
                'status'        => true,
                'message'       => 'Koneksi berhasil.',
                'access_token'  => $accessToken,
                'data'          => $data
            ];
        } else {
            return [
                'status'    => false,
                'message'   => 'Gagal mendapatkan access token',
                'details'   => $data,
            ];
        }
    }

    private function getLongTerm($token)
    {
        $response = Http::get('https://graph.instagram.com/access_token', [
            'grant_type'    => 'ig_exchange_token',
            'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
            'access_token'  => $token
        ]);

        // Response dari Instagram API
        $data = $response->json();

        if ($response->successful()) {
            $accessToken = $data['access_token'];

            return [
                'status'        => true,
                'message'       => 'Koneksi berhasil.',
                'access_token'  => $accessToken,
                'data'          => $data
            ];
        } else {
            return [
                'status'    => false,
                'message'   => 'Gagal mendapatkan access token',
                'details'   => $data,
            ];
        }
    }

    public function activation($id)
    {
        // Initialize
        $getAccount = Account::where('id', $id)->first();

        if (!$getAccount) {
            return redirect()->back()->withErrors('Data tidak ditemukan');
        }

        // Initialize
        $url    = 'me';
        $body   = [
            'fields'        => 'user_id,username,name,account_type',
            'access_token'  => $getAccount->token
        ];

        // Call API
        $response = $this->callMetaGet($url, $body);

        if ($response['status']) {
            // Initialize
            $extractData = $response['data'];

            FieldsInstagram::create([
                'account_id'    => $getAccount->id,
                'name'          => $extractData['name'],
                'instagram_id'  => $extractData['user_id'],
                'account_type'  => $extractData['account_type']
            ]);

            $getAccount->update([
                'status'        => 'Active',
                'nama_sosmed'   => $extractData['username']
            ]);

            return redirect()->back()->withSuccess('Aktivasi Akun Berhasil');
        }

        return redirect()->back()->withErrors('Aktivasi Akun Gagal');
    }

    private function callMetaGet($url, $body)
    {
        $response = Http::get('https://graph.instagram.com/v20.0/' . $url, $body);

        // Response dari Instagram API
        $data = $response->json();

        if ($response->successful()) {
            return [
                'status'    => true,
                'message'   => 'Berhasil mendapatkan data.',
                'data'      => $data
            ];
        } else {
            return [
                'status'    => false,
                'message'   => 'Gagal mendapatkan data.'
            ];
        }
    }
}

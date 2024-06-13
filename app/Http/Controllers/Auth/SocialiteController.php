<?php

namespace App\Http\Controllers\Auth;

use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'nama_sosmed' => 'twitter '.$user->name,
            'token' => $user->token,
            'app' => 'Twitter',
            'temp_credentials' => null,
            'status' => 'Active',
            'token_serialize_tweet' => null,
            'data' => json_encode($json),
        ]);

        return redirect('user/account-sosmed')->withSuccess('Twitter Account Connected');

        return redirect()->route('home'); // Redirect to your desired route
    }
}

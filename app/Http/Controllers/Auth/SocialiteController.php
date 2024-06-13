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

        return redirect('account')->withSuccess('Twitter Account Connected');

        // return redirect()->route('home'); // Redirect to your desired route
    }

    public function redirectToProviderInstagram()
    {
        return Socialite::driver('instagram')->redirect();
    }

    public function handleProviderCallbackInstagram()
    {
        $user = Socialite::driver('instagram')->user();


        $data = [
            'user' => [
                "uid" => $user->getId(),
                "nickname" => $user->getNickname( ),
                "name" =>  $user->getName(),
                "firstName" => null,
                "lastName" => null,
                "email" => null,
                "location" => "",
                "description" => null,
                "imageUrl" => $user->getAvatar(),
                "token" => $user->token,
            ]
        ];

        $account = Account::create([
            'nama_sosmed' => 'instagram oauth',
            'token' => $user->token,
            'data' => json_encode($data),
            'status' => 'Active',
            'app' => "Instagram",
            'token_serialize_tweet' => null,
            'temp_credentials' => null,
        ]);

        // TODO: Handle the authenticated user, e.g., save to database or session

        return redirect('account')->withSuccess("Success connect to Instagram");
    }


}

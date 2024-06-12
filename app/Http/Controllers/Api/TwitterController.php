<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    //

    // public function indexgetTweet(){
    //     $url = "https://api.twitter.com/2/tweets";

    //     // JSON payload
    //     $data = array(
    //         "text" => "just setting up my #TwitterAPI"
    //     );
    //     $jsonData = json_encode($data);

    //     // Authorization token
    //     $token = "AAAAAAAAAAAAAAAAAAAAAAePsAEAAAAAgierfUSacwoEFeDml%2BVN7Kn8pYE%3D2zT19aX5DUQ4KNDEnyQVNvm4LWU5JpqXnvxl1tjfSt4s08tt94"; // Replace with your actual token

    //     // cURL request
    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         "Content-Type: application/json",
    //         "Authorization: Bearer $token"
    //     ));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     $response = curl_exec($ch);

    //     if(curl_errno($ch)) {
    //         echo 'Error: ' . curl_error($ch);
    //     } else {
    //         // Print the response
    //         echo $response;
    //     }

    //     // Close cURL session
    //     curl_close($ch);
    // }

    public function indexgetTweet(){
        $url = "https://api.twitter.com/2/tweets";

        // JSON payload
        $data = array(
            "text" => "just setting up my #TwitterAPI"
        );
        $jsonData = json_encode($data);

        // Twitter API credentials
        $consumerKey = "WiEDvbDiDTAv3xkAeJKjpsQFF"; // Replace with your actual consumer key
        $consumerSecret = "JXT5tBmK4hf4Bg7YadMzpCrSFU6Gn4XR7pB668Eh2ZIVuRVfcG"; // Replace with your actual consumer secret

        // Encode credentials
        $encodedCredentials = base64_encode($consumerKey . ':' . $consumerSecret);

        // cURL request
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Authorization: Basic " . $encodedCredentials
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if(curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            // Print the response
            echo $response;
        }

        // Close cURL session
        curl_close($ch);
    }
}

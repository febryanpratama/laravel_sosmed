<?php

function postType($type)
{
    switch ($type) {
        case '1':
            $value = 'Posting Tunggal';
            break;
        case '2':
            $value = 'Carousel';
            break;
        case '3':
            $value = 'Reels';
            break;

        default:
            $value = 'Posting Tunggal';
            break;
    }

    return $value;
}

function waStatus($status)
{
    switch ($status) {
        case 0:
            $value = 'Dalam Antrean';
            break;
        case 1:
            $value = 'Terkirim';
            break;
        case 2:
            $value = 'Gagal Dikirim';
            break;

        default:
            $value = 'Dalam Antrean';
            break;
    }

    return $value;
}

if (!function_exists('apiResponse')) {
    function apiResponse($status, $message, $data = null, $code = 200)
    {
        return response()->json([
            'status'    => $status,
            'message'   => $message,
            'data'      => $data
        ], $code);
    }
}

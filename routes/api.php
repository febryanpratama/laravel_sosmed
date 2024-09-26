<?php

use App\Http\Controllers\Api\TwitterController;
use App\Http\Controllers\Api\CallbackController;
use App\Http\Controllers\Api\WebhooksMetaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Callback
Route::get('callback', [CallbackController::class, 'index']);
Route::get('twitter', [TwitterController::class, 'indexgetTweet']);

// Webhooks META
Route::get('request/webhooks', [WebhooksMetaController::class, 'store']);

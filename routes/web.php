<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FarmasiController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\WaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('auth/login');
});

Route::prefix('auth')->group(function(){
    Route::get('login', [AuthController::class, 'index']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'store']);
});

Route::get('home', function(){
    return view('pages.home.index');
});

Route::prefix('konten')->group(function(){
    Route::get('/', [KontenController::class, 'index']);
    Route::post('/', [KontenController::class, 'store']);
});
Route::prefix('account')->group(function(){
    Route::get('/', [AccountController::class, 'index']);
    Route::post('/', [AccountController::class, 'store']);
});

Route::prefix('broadcast')->group(function(){
    // Email Controller
    Route::prefix('email')->group(function(){
        Route::get('/', [EmailController::class, 'index']);
        Route::get('/create', [EmailController::class, 'create']);
        Route::post('/create', [EmailController::class, 'store']);
        Route::get('/send/{email}', [EmailController::class, 'sendEmail']);
        Route::get('/edit/{email}', [EmailController::class, 'edit']);
    });

    // Whatsapp Controller

    Route::prefix('whatsapp-blast')->group(function(){
        Route::get('/', [WaController::class, 'index']);
        Route::get('/create', [WaController::class, 'create']);

    });
});
Route::get('logout', [AuthController::class, 'logout']);
<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\KontenController;
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

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'store']);
});

Route::middleware('checksession')->group(function () {
    Route::get('home', function () {
        return view('pages.home.index');
    });

    Route::prefix('konten')->group(function () {
        Route::get('/', [KontenController::class, 'index']);
        Route::post('/', [KontenController::class, 'store'])->name('konten.store');
    });

    Route::prefix('account')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('account.index');
        // Route::post('/', [AccountController::class, 'store']);
        Route::get('activation/{id}', [SocialiteController::class, 'activation'])->name('activation');
    });

    Route::prefix('broadcast')->group(function () {
        // Email Controller
        Route::prefix('email')->group(function () {
            Route::get('/', [EmailController::class, 'index']);
            Route::get('/create', [EmailController::class, 'create']);
            Route::post('/create', [EmailController::class, 'store']);
            Route::get('/send/{email}', [EmailController::class, 'sendEmail']);
            Route::get('/edit/{email}', [EmailController::class, 'edit']);
            Route::get('/hapus/{email}', [EmailController::class, 'hapus']);
            Route::post('/update', [EmailController::class, 'update']);
        });

        // Whatsapp Controller
        Route::prefix('whatsapp-blast')->group(function () {
            Route::get('/', [WaController::class, 'index']);
            Route::get('/create', [WaController::class, 'create']);
            Route::post('/store', [WaController::class, 'store'])->name('wa.store');
        });
    });

    Route::get('auth/twitter', [SocialiteController::class, 'redirectToProviderTwitter']);
    Route::get('auth/instagram', [SocialiteController::class, 'redirectToProviderInstagram']);

    Route::middleware(['web'])->group(function () {
        Route::get('auth/twitter/callback', [SocialiteController::class, 'handleProviderCallbackTwitter']);
        Route::get('auth/instagram/callback', [SocialiteController::class, 'handleCallbackInstagram']);
    });
});


Route::get('logout', [AuthController::class, 'logout']);

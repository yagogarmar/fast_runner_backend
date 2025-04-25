<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TimesController;
use App\Http\Controllers\WebCommonController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


// VISTAS
Route::get('/login', [WebCommonController::class , 'viewLogin'])->name('login');

Route::get('/', [WebCommonController::class , 'viewHome'])->name('home');

Route::get('/levels', [WebCommonController::class , 'viewLevels'])->name('levels');

Route::get('/levels/{id}',[WebCommonController::class , 'viewLevel']);







Route::get('/csrf-token', function (Request $request) {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::post('/login',           [AuthController::class, 'webLogin']);
Route::post('/register',        [AuthController::class, 'apiRegister']);

Route::get('/level',            [LevelsController::class , 'get']);
Route::get('/level/{id}',       [LevelsController::class , 'show']);

Route::group(['prefix' => 'time'], function () {
    Route::get('/get/{id}',          [TimesController::class, 'get'] );
});

Route::middleware('auth')->group(function() {
 
    Route::get('/perfil', function () {
        return view('perfil');
    });

    Route::any('/logout', [AuthController::class, 'webLogout']);

    Route::post('/comment',           [LevelsController::class, 'comment']);

    Route::group(['prefix' => 'store'], function () {
        Route::get('/products',          [StoreController::class, 'get'] );
        Route::get('/products/{id}',          [StoreController::class, 'show'] );
        Route::get('/buy/{id}',          [StoreController::class, 'buy'] );
    });
});
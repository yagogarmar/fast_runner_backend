<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimesController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


// VISTAS
Route::get('/login', function () {
    return view('login');
})->name('login');



Route::get('/csrf-token', function (Request $request) {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::post('/login',           [AuthController::class, 'webLogin']);
Route::post('/register',        [AuthController::class, 'apiRegister']);

Route::group(['prefix' => 'time'], function () {
    Route::get('/get/{id}',          [TimesController::class, 'get'] );
});

Route::middleware('auth')->group(function() {
 
    Route::get('/perfil', function () {
        return view('perfil');
    });

    Route::any('/logout', [AuthController::class, 'webLogout']);


});
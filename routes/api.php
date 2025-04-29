<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'apiLogin']);
Route::post('register', [AuthController::class, 'apiRegister']);

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('logout', [AuthController::class, 'apiLogout']);

    Route::post('/time', [TimesController::class, 'newTime']);
      
});
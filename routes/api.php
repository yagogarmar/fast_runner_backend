<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'api.key'], function() {

    Route::post('/login', [AuthController::class, 'apiLogin']);
    Route::post('/register', [AuthController::class, 'apiRegister']);
    
    Route::group(['middleware' => 'auth:api'], function() {
    
        Route::get('/logout', [AuthController::class, 'apiLogout']);
    
        Route::post('/time', [TimesController::class, 'newTime']);
          
    });
});

Route::post('/time', [TimesController::class, 'newTime'])->middleware('api.key');

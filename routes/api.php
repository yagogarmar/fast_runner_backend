<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'apiLogin']);

Route::group(['middleware' => 'auth:api'], function() {

      Route::get('logout', [AuthController::class, 'apiLogout']);
      
});
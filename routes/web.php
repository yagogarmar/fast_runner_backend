<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// VISTAS
Route::get('/login', function () {
    return view('login');
})->name('login');





Route::post('/login', [AuthController::class, 'webLogin']);

Route::middleware('auth')->group(function() {
 
    Route::get('/perfil', function () {
        return view('perfil');
    });


    Route::any('/logout', [AuthController::class, 'webLogout']);


});
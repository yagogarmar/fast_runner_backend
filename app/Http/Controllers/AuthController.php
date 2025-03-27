<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function webLogin(Request $request){

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return response()->json([
                "message" => "Inicio de sesion correcto "
            ], 200);
        }

        return response()->json([
            "message" => "Credenciales invalidas"
        ], 401);
    }

    public function webLogout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return response()->json([
            "message" => "Sesion cerrada correctamente"
        ], 200);
    }
}

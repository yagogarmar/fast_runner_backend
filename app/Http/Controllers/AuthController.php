<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    
    public function apiLogin(Request $request){
        
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('username', $request->username)->first();
        
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 422);
        }
    }

    public function apiLogout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

    public function webLogout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return response()->json([
            "message" => "Sesion cerrada correctamente"
        ], 200);
    }

    public function apiRegister(Request $request){

        $user = User::create([
            "username" => $request->username,
            "email" => $request->email,
            "password" => $request->password
        ]);

        if($user){
            return response()->json([
                "message" => "Usuario creado correctamente",
                "user" => $user
            ], 201);
        }

        return response()->json([
            "message" => "Ha ocurrido un error",
        ], 400);
    }
}

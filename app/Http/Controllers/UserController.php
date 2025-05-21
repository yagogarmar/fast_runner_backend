<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editUser(Request $request){

        $validated = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'bio' => 'required|string',
        ]);

        $user = $request->user();

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'bio' => $request->bio
        ]);

        $user->save();

        if($user){
            return response()->json([
                "data" => "Usuario editado correctamente",  
                "user" => $user
            ],201);

        }else{
            return response()->json([
                "data" => "Ha ocurrido un error"
            ],400);
        }



    }
}

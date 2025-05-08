<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class WebCommonController extends Controller
{
    public function viewLogin(){

        return view('login');
    }

    public function viewRegister(){

        return view('register');
    }

    public function viewHome(Request $request ){

        $user = $request->user();

        return view('home', compact('user'));
    }
    public function viewDownload(Request $request ){

        $user = $request->user();

        return view('download', compact('user'));
    }

    public function viewLevels(Request $request ){
        $levels = Level::all();
        $user = $request->user();

        return view('levels', compact('levels','user'));
    }

    public function viewLevel(Request $request, $id ){
        $user = $request->user();
        $level = Level::where('id', $id)->first();

        $comentarios = $level->comments()->get();
        
        return view('level', compact('user', 'comentarios'));
        
    }
    
    public function viewPerfil(Request $request ){
        $user = $request->user();

        return view('perfil', compact('user'));
    } 
}


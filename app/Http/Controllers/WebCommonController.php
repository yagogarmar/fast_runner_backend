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

    public function viewHome(){
        return view('home');
    }


    public function viewLevels(){
        $levels = Level::all();

        return view('levels', compact('levels'));
    }

    public function viewLevel(){

        return view('level');
    }
}

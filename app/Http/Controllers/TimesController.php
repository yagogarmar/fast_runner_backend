<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimesController extends Controller
{
    public function newTime(Request $request){
        $time = Time::create([
            "user_id" => $request->user()->id,
            "level_id" => $request->level_id,
            "time" => $request->time,
            "completed" => $request->completed

        ]);

        if($time){
            return response()->json([
                "message" => "Tiempo registrado correctamente",
                "time" => $time
            ],201);
        }

        return response()->json([
            "message" => "Ha ocurrido un error"
        ],400); 

    }

    // WEB

    public function get(Request $request, $id){
        $times = null;
        
        if($request->mytmies){
            $user_id = $request->user()->id;
            $times = Time::where('level_id', $id)->where('user_id', $user_id)->paginate(3);

        }else{
            $times = Time::where('level_id', $id)->paginate(3);
        }

        return response()->json([
            "data" => $times,
            "record" => $times->sortBy('precio')->first()
        ]);
    }

}

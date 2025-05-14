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
            $times = Time::where('level_id', $id)->where('completed', 1)->orderBy('time', 'asc')->where('user_id', $user_id)->paginate(3);

        }else{
            $times = Time::where('level_id', $id)->where('completed', 1)->orderBy('time', 'asc')->paginate(5);
        }

        return response()->json([
            "data" => $times
        ]);
    }

    public function getRecord(Request $request, $id){
        $times = null;
        $times = Time::where('level_id', $id)->where('completed', 1)->orderBy('time', 'asc')->get();
       

        return response()->json([
            "data" => $times->first()
        ]);
    }

    public function getTimesUser(Request $request){
        $user = $request->user();

        $times = $user->times()->with('level')->where('completed', 1)->orderBy('created_at', 'desc')->paginate(5);

        return response()->json([
            "data" => $times
        ]);

    }

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Level;
use Illuminate\Http\Request;


class LevelsController extends Controller
{
    public function get(){

        $levels = Level::get();

        return response()->json([
            "data" => $levels
        ]);

        
    }

    public function show($id){

        $level = Level::where('id', $id)->with('times.user')->first();

        return response()->json([
            "data" => $level
        ]);
    }

    public function comment(Request $request){

        $comment = Comment::create([
            "level_id" => $request->level_id,
            "user_id" => $request->user()->id,
            "parent_id" => $request->parent_id,
            "content" => $request->content
        ]);



        if($comment){

            $completeComent = Comment::where('id', $comment->id)->first();


            return response()->json([
                "message" => "Comenario creado correctamente",
                "comment" => $completeComent
            ], 201);
        }

        return request()->json([
            "message" => "Ha ocurrido un error"
        ], 400);
    }
}

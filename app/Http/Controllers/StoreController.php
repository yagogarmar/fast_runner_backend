<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function get(Request $request){
        

        $productos = Product::all()->paginate(10);

        if($productos){
            return response()->json([
                "data" => $productos,
            
            ],200);
        }
        return response()->json([
            "message" => "Ha ocurrido un error",
        ],400);
    }


    public function show($id){

        $product = Product::where('id', $id)->first();

        if($product){
            return response()->json([
                "data" => $product
            ], 200);
        }

        return response()->json([
            "message" => "Ha ocurrido un error"
        ], 400);
        

    }
}

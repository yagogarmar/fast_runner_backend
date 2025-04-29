<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function get(Request $request){
        

        $productos = Product::get();

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

    public function buy(Request $request, $id){

        $user = $request->user();
        $product = Product::where('id' , $id)->first();

        if($product){

            if($user->monedas - $product->precio >= 0){

                $user->monedas = $user->monedas - $product->precio;
                $user->save();

                $user->products()->attach($product->id);

                return response()->json([
                    "message" => "Producto comprado correctamente"
                ], 201);
            }

            return response()->json([
                "message" => "No tienes sufucuentes monedas"
            ], 400);


        }
        
        return response()->json([
            "message" => "Ha ocurrido un error"
        ], 400);
    }

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::table('products')->insert([
            'name' => 'Producto 1',
            'precio' => 2000,
            'img' => 'img'
        ]);

        DB::table('products')->insert([
            'name' => 'Producto 2',
            'precio' => 6969,
            'img' => 'img'
        ]);

        DB::table('products')->insert([
            'name' => 'Producto 3',
            'precio' => 1,
            'img' => 'img'
        ]);

        DB::table('products')->insert([
            'name' => 'Producto 4',
            'precio' => 3333,
            'img' => 'img'
        ]);

        DB::table('products')->insert([
            'name' => 'Producto 5',
            'precio' => 5555,
            'img' => 'img'
        ]);

    }
}

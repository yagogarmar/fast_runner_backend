<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        DB::table('comments')->insert([
            'level_id' => 1,
            'user_id' => 1,
            'parent_id' => null,
            'content' => 'mensaje de prueba :)'
        ]);

        DB::table('comments')->insert([
            'level_id' => null,
            'user_id' => 1,
            'parent_id' => 1,
            'content' => 'respuesta de prueba '
        ]);

        DB::table('comments')->insert([
            'level_id' => 1,
            'user_id' => 1,
            'parent_id' => null,
            'content' => 'Hola mundo >_<'
        ]);
    }
}

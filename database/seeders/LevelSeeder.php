<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        
        DB::table('levels')->insert([
            'name' => 'LVL01'
        ]);

        DB::table('levels')->insert([
            'name' => 'LVL02'
        ]);

        DB::table('levels')->insert([
            'name' => 'LVL03'
        ]);

        DB::table('levels')->insert([
            'name' => 'LVL04'
        ]);

        DB::table('levels')->insert([
            'name' => 'LVL05'
        ]);

        DB::table('levels')->insert([
            'name' => 'LVL06'
        ]);

        DB::table('levels')->insert([
            'name' => 'LVL07'
        ]);

        DB::table('levels')->insert([
            'name' => 'LVL08'
        ]);
    }
}

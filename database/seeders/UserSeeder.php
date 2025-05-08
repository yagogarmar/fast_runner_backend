<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'test',
            'email' => 'test@gmail.com',
            'monedas' => 500,
            'password' => Hash::make('0000'),
        ]);
        DB::table('users')->insert([
            'username' => 'john_doe',
            'email' => 'john_doe@gmail.com',
            'monedas' => 500,
            'password' => Hash::make('0000'),
        ]);
        DB::table('users')->insert([
            'username' => 'txema_00',
            'email' => 'txema_00@gmail.com',
            'monedas' => 500,
            'password' => Hash::make('0000'),
        ]);
        DB::table('users')->insert([
            'username' => 'uerynotu',
            'email' => 'uerynotu@gmail.com',
            'monedas' => 500,
            'password' => Hash::make('0000'),
        ]);
        DB::table('users')->insert([
            'username' => 'depardis',
            'email' => 'depardis@gmail.com',
            'monedas' => 500,
            'password' => Hash::make('0000'),
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'monedas' => 500,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('0000'),
        ]);
    }
}

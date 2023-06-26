<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => "Admin",
                'email' => 'admin@gmail.com',
                'password' => Hash::make('qwerty123'),
                'role' => 'admin',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Customer",
                'email' => 'customer@gmail.com',
                'password' => Hash::make('qwerty123'),
                'role' => 'customer',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

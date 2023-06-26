<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                'bio' => "Saya adalah admin",
                'gender' => 'm',
                'date_of_birth' => '2000-02-02',
                'user_id' => '1',
                'created_at' => Carbon::now()
            ],
            [
                'bio' => "Saya adalah customer",
                'gender' => 'w',
                'date_of_birth' => '2001-01-01',
                'user_id' => '2',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

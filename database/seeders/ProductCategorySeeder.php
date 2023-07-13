<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            [
                'name' => "Cupcakes",
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Sliced Cakes",
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Macaron",
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Bread",
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

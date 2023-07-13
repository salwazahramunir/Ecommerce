<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => "Red Velvet Cup Cake with Strawberry",
                'price' => 21000,
                'image' => "https://omni.harvestcakes.com/media/thumb/product_photo/2022/8/27/jp9qxfd62pynbuy2ljnace_size_480_webp.webp",
                'description' => "Red velvet flavor cup cake topped with cream frosting and strawberry.",
                'stock' => 5,
                'product_category_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Chocomaltine Cheesecake",
                'price' => 40000,
                'image' => "https://omni.harvestcakes.com/media/thumb/product_photo/2022/7/25/xdupxlejq9v7arr7ikjswf_size_480_webp.webp",
                'description' => "A new chocolate flavor filling mixed with cheesy cream in moist soft sponge",
                'stock' => 7,
                'product_category_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Epicron in a Box",
                'price' => 179000,
                'image' => "https://omni.harvestcakes.com/media/thumb/product_photo/2022/10/28/fphmozezr4azgd3ao59lfc_size_480_webp.webp",
                'description' => "Bigger, better, tastier! Our macarons come in a bigger size with 6 different flavors.",
                'stock' => 5,
                'product_category_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Le Supreme Croissant Dark Chocolate",
                'price' => 25000,
                'image' => "https://omni.harvestcakes.com/media/thumb/product_photo/2022/9/30/vsrpta2qca58mvsyxr2mxc_size_480_webp.webp",
                'description' => "Rolled caramelized butter croissant with luscious dark chocolate crème filling",
                'stock' => 2,
                'product_category_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Blueberry Cheesecake",
                'price' => 40000,
                'image' => "https://omni.harvestcakes.com/media/thumb/product_photo/2022/7/25/2wjfe3egq7gtwoxl9bfink_size_480_webp.webp",
                'description' => "Our famous cheesecake pairs perfectly with natural blueberries",
                'stock' => 2,
                'product_category_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Oreo Cup Cake",
                'price' => 25000,
                'image' => "https://omni.harvestcakes.com/media/thumb/product_photo/2022/8/27/o9gymfhkh4pbwxtzesq438_size_480_webp.webp",
                'description' => "Vanilla cupcake with oreo cream on top and garnished with oreo crumble.",
                'stock' => 4,
                'product_category_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Red Velvet Epicron",
                'price' => 25000,
                'image' => "https://omni.harvestcakes.com/media/thumb/product_photo/2022/10/28/k6i524fqu5r828kztpeyhg_size_480_webp.webp",
                'description' => "Bigger macaron filled with cream cheese and red velvet cake crumbs.",
                'stock' => 5,
                'product_category_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Strawberry Cruffin",
                'price' => 29000,
                'image' => "https://omni.harvestcakes.com/media/thumb/product_photo/2023/2/27/esgxdzurxfbptur2smetdx_size_480.jpg",
                'description' => "Croissants with a flaky texture come in muffin shape. To add some freshness, it's filled with an overflow of strawberry jam and topped with sugar powder and strawberry slices.",
                'stock' => 8,
                'product_category_id' => 4,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

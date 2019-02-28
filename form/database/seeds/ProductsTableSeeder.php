<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Predator',
            'price' => '$129',
            'picture' => 'uploads/predator.jpg',
            'description' => 'Predator Size 8 M',
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Stan Smith',
            'price' => '$89',
            'picture' => 'uploads/predator.jpg',
            'description' => 'Stan Smith Size 6 W',
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'Green Shirt',
            'price' => '$29',
            'picture' => 'uploads/shirt.jpg',
            'description' => 'Green Shirt Size S',
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'Red Pant',
            'price' => '$49',
            'picture' => 'uploads/pant.jpg',
            'description' => 'Red Pant Size 38 M',
        ]);
    }
}

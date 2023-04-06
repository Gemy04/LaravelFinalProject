<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Instantiate Faker library
        $faker = Faker::create();

        // Generate fake data for products table
        for ($i = 1; $i <= 50; $i++) {
            $products[] = [
                'category_id' => $faker->randomElement([1, 2, 3]),
                'name' => $faker->words(3, true),
                'slug' => $faker->slug,
                'image' => $faker->imageUrl(640, 480, 'clothes', true),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 10, 1000),
                'quantity' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert products data
        DB::table('products')->insert($products);
    }
}


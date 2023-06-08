<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Category_tag;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Category_tagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ja_JP');

        $restaurantIds = Restaurant::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();

        for ($i = 0; $i < 5; $i++) {
            Category_tag::create([
                'restaurant_id' => $faker->randomElement($restaurantIds),
                'category_id' => $faker->randomElement($categoryIds),
            ]);
        }
    }
}

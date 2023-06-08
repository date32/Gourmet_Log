<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\User;
use Faker\Factory as Faker;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ja_JP');

        // $users = User::all(); // usersテーブルから全てのユーザーを取得
        $users = User::pluck('id')->toArray();

       
            for ($i = 0; $i < 15; $i++) {
                Restaurant::create([
                    'user_id' => $faker->randomElement($users),
                    'name' => $faker->company,
                    'name_katakana' => $faker->kanaName,
                    'review' => $faker->numberBetween(1, 5),
                    // 'food_picture' => $faker->imageUrl(),
                    // 'map_url' => $faker->url,
                    'tel' => $faker->phoneNumber,
                    'comment' => $faker->sentence,
                    
                ]);
            
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('ja_JP');

        // User::create([
        //     'name' => $this->$faker->name(),
        //     'email' => $this->$faker->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'two_factor_secret' => null,
        //     'two_factor_recovery_codes' => null,
        //     'remember_token' => Str::random(10),
        //     'profile_photo_path' => null,
        //     'current_team_id' => null,
        // ]);

        for ($i = 0; $i < 3; $i++) {
            User::create([
                'name' => $faker->company,
                'email' => $faker->email,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                // 'remember_token' => Str::random(10),
                // 'current_team_id' => null,
                // 'profile_photo_path' => null,
            ]);
        }


    }
}

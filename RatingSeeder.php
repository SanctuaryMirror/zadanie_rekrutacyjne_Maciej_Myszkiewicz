<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('ratings')->insert([
                'email' => $faker->email,
                'rating' => $faker->numberBetween(1,5),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

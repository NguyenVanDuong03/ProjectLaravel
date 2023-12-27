<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<10; $i++) {
            Course::create([
                'flight_id' => $faker->unique()->randomNumber(),
                'aircraft_id' => $faker->unique()->randomNumber(),
                'departure_airport' => $faker->city,
                'arrival_airport' => $faker->city,
                'departure_time' => $faker->dateTimeThisMonth(),
                'arrival_time' => $faker->dateTimeThisMonth(),
                'flight_duration' => $faker->time,
            ]);
        }
    }
}

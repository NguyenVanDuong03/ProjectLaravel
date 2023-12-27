<?php

namespace Database\Seeders;

use App\Models\Motelsoft;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MotelsoftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $sogiothue = Motelsoft::pluck('sogiothue');
        $dongiatheogio = Motelsoft::pluck('dongiatheogio');
        for($i=0; $i<50; $i++) {
            Motelsoft::create([
                'maphong' => $i+1,
                'tenkhach' => $faker->name(),
                'cccd' => $faker->numerify('023#####'),
                'thoigiannhanphong' => $faker->DateTime(),
                'thoigiantraphong' => $faker->dateTime(),
                'sogiothue' => $faker->numberBetween(1, 5),
                'dongiatheogio' => $faker->numberBetween(1, 10),
                'tongtien' => $sogiothue * $dongiatheogio,
            ]);
        }
    }
}

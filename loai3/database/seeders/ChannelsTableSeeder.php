<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<50; $i++) {
            Channel::create([
                'channel_id' => $i+1,
                'channel_name' => $faker->name(),
                'description' => $faker->sentence(1, true),
                'subscriberscount' => $faker->numberBetween(1, 20),
                'url' => $faker->url(),
            ]);
        }
    }
}

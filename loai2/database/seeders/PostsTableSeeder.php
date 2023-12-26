<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<50; $i++) {
            Post::create([
                'post_id' => $i+1,
                'name' => $faker->name(),
                'gender' => $faker->randomElement(['Nam', 'Nữ', 'Bí mật']),
                'birthday' => $faker->date(),
                'phone' => $faker->numerify('09########'),
            ]);
        }
    }
}

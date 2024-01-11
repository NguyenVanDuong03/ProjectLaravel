<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<20; $i++) {
            Book::create([
                'bookid' => $i+1,
                'title' => $faker->words(2, true),
                'author' => $faker->name,
                'isbn' => $faker->ean13(),
                'publishedyear' => $faker->numberBetween('1988', '2024'),
                'genre' => $faker->words(1, true),
            ]);
        }
    }
}

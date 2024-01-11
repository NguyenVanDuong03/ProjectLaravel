<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\borrowing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BorrowingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book_ids = Book::all()->pluck('bookid')->toArray();
        $faker = Faker::create();
        for($i=0; $i< 200; $i++) {
            $borrowdate = $faker->dateTimeBetween('-3 years', 'now');
            $duedate = $faker->dateTimeBetween($borrowdate, '+1 years');
            borrowing::create([
                'borrowingid' => $i+1,
                'bookid' => $faker->randomElement($book_ids),
                'memberid' => $faker->numberBetween('1', '100'),
                'borrowdate' => $borrowdate,
                'duedate' => $duedate,
                'returneddate' => $faker->dateTimeBetween($borrowdate, $duedate),
            ]);
        }
    }
}

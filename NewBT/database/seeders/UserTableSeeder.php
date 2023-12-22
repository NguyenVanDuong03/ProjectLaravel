<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("user")->delete();
        $faker = Faker::create();
        for ($i=0; $i<50; $i++) {
            User::create([
                'name'=> $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
            ]);
        }
    }
}

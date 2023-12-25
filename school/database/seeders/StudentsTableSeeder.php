<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Course;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $course_id = Course::pluck('course_id');
        for($i=0; $i<50; $i++) {
            Student::create([
                'student_id' => $i+1,
                'name' => $faker->name(),
                'gender' => $faker->randomElement(['Nam', 'Nữ', 'Khác']),
                'birthday' => $faker->date(),
                'address' => $faker->city(),
                'phone' => $faker->numerify('0#########'),
                'course_id' => $course_id->random(),
            ]);
        }
    }
}

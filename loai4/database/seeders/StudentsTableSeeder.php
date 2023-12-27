<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
                'student_name' => $faker->name(),
                'gender' => $faker->randomElement(['Nam', 'Nữ', 'Bí mật']),
                'birthday' => $faker->date(),
                'address' => $faker->city(),
                'phone' => $faker->numerify('09########'),
                'course_id' => $course_id->random(),
            ]);
        }
    }
}

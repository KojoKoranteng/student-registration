<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0; $i<200; $i++){
            DB::table('students')->insert([
                'firstName' => $faker->firstName(),
                'lastName' =>$faker->lastName(),
                'dob' => $faker->date(),
                'student_id'=>'ST'.rand(10,199536564),
                'gender'=> 'Male',
                'contact'=> '0201000000',
                'programme_id'=>rand(1,200),
                'created_at'=> Carbon::now()
            ]);

            // DB::table('students')->insert([
            //     'id'=> '1,
            //     'firstName' =>$faker->firstName($gender = 'female'),
            //     'lastName' => $faker->lastName(),
            //     'dob' => $faker->date($format = 'y-m-d', $min = '1995', $max= '2015'),
            //     'student_id'=>'ST'.rand(10,199),
            //     'gender'=> 'Female',
            //     'contact'=> '0242000333',
            //     'programme_id'=>rand(1,200),
            //     'created_at'=> Carbon::now()
            // ]);
        }
    }
}

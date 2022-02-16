<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Programmes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $programme = Programmes::find(1);
        // $course = new Course();
        // $course->course_name = "Laravel Essentials";
        // $course->duration = 15;
        // $course->course_id = 'LAV100';
        // $course->save();
        // $course->programmes()->attach($programme);

        for($i=0; $i<200; $i++){
            DB::table('courses')->insert([
                'course_name' => 'Java'.$i,
                'course_id' => 'JV'.$i,
                'duration' => rand(30,60),
                'created_at'=> Carbon::now()
            ]);
            
            DB::table('courses')->insert([
                'course_name' => 'Bootstrap'.$i,
                'course_id' => 'BS'.$i,
                'duration' => rand(30,60),
                'created_at'=> Carbon::now()
        ]);
    }
    }
    
}

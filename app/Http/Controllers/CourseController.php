<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Programmes;

class CourseController extends Controller
{
    //
    public function showAllCourses(){

        //$allCourses = Course::all();
        $allCourses = Course::paginate(20);
        //dd($allCourses);
        return view('courses.list',['courses'=>$allCourses]);
        //return view('courses.list')->with('courses',$allCourses); another way to pass data, you could add multiple data, called chaining
    }

    public function showAddCoursePage(){
        $allProgrammes = Programmes::all();

        return view('courses.course-form')
         ->with('course', new Course)
         ->with('edit', false);
    }

    public function showEditCoursePage($id){
        $course = Course::findOrFail($id);
        $allProgrammes = Programmes::all();

        return view('courses.course-form')
         ->with('edit', true)
         ->with('course', $course);
    }

    public function saveCourse(Request $request){

        // 1st arg -> rules
        // 2nd arg -> custom messages
        // 3rd arg -> attribute names
        $request->validate([
            'name' => 'required|min:10|max:100|unique:courses,name',
            'course_id' => 'required|min:6|max:20|unique:courses,course_id',
            'duration'=> 'required|max:35'
        ],[
            // custom messages
            'unique' => 'This :attribute is already registered in the system'
        ],[
            // custom attribute names
            'name' => 'course name',
        ]);

        $newCourse = new Course;
        $newCourse->course_name = $request->input('course_name');
        $newCourse->course_id = $request->input('course_id');
        $newCourse->duration = $request->input('duration');

        $newCourse->programmes()->sync($request->input('programmes'));
        $newCourse->save();
        session()->flash('alert',$newCourse->course_name, 'created successfully');
        
        return back();

        // $data = $request->all();
        // unset($data['_token']);
        // Course::create($data);
    }

    public function updateCourse(Request $request){
        $course = Course::findOrFail( $request->input('id'));
        $course->name = $request->input('name');
        $course->duration = $request->input('duration');
        $course->course_id = $request->input('course_id');
        $course->save();
        $course->programmes()->sync($request->input('programmes'));
        session()->flash('alert', $course->name. ' updated successfully');
        return redirect('/courses');
    }

    public function deleteCourse(Request $request){
        $course = Course::findOrFail( $request->input('id'));
        $course->delete();
        session()->flash('alert', $course->name. ' deleted successfully');
        return redirect('/courses');
    }
}

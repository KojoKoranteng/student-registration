<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Programmes;

class StudentController extends Controller
{
    public function showAllStudents(){

        $allStudents = Student::all();
        //dd($allstudents);
        return view('student.list',['students'=>$allStudents]);
        //return view('students.list')->with('students',$allstudents); another way to pass data, you could add multiple data, called chaining
        //return view('students.list')->with('students',Student::all());
    }

    public function showAddStudentsPage(){
        return view('student.studentForm')
         ->with('student', new Student)
         ->with('edit', false)
         ->with('programmes', Programmes::all());
    }

    public function showEditStudentsPage($id){
        $student = Student::findOrFail($id);
        return view('student.studentForm')
         ->with('edit', true)
         ->with('student', $student);
    }

    public function saveStudent(Request $request){

        // 1st arg -> rules
        // 2nd arg -> custom messages
        // 3rd arg -> attribute names
        $request->validate([
            'fullname' => 'required|min:2|max:100',
            'dob' => 'required|min:11|max:30|',
            'student_id' => 'required|min:6|max:20|unique:students,student_id',
            'gender'=> 'required|min:1|max:6',
            'contact'=> 'required|min:10|max:20|unique:students,contact',

        ],[
            // custom messages
            'unique' => 'This :attribute is already registered in the system'
        ],[
            // custom attribute names
            //'name' => 'student name',
        ]);

        $newStudent = new Student;
        $newStudent->fullname = $request->input('fullname');
        $newStudent->dob = $request->input('dob');
        $newStudent->student_id = $request->input('student_id');
        $newStudent->gender = $request->input('gender');
        $newStudent->contact = $request->input('contact');

        $newStudent->save();
        session()->flash('alert',$newStudent->fullname, 'created successfully');
        
        return back();

        // $data = $request->all();
        // unset($data['_token']);
        // Student::create($data);

    }

    public function updateStudent(Request $request){
        $student = Student::findOrFail( $request->input('id'));
        $student->fullname = $request->input('fullname');
        $student->dob = $request->input('dob');
        $student->student_id = $request->input('student_id');
        $student->gender = $request->input('gender');
        $student->contact = $request->input('contact');
        $student->save();
        session()->flash('alert', $student->fullname. ' updated successfully');
        return redirect('/students');
    }

    public function deleteStudent(Request $request){
        $student = Student::findOrFail( $request->input('id'));
        $student->delete();
        session()->flash('alert', $student->fullname. ' deleted successfully');
        return redirect('/students');
    }

}

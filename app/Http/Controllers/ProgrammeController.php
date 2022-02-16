<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programmes;

class ProgrammeController extends Controller
{
    public function showProgrammes(){
        //for showing all
        //$allProgrammes = Programmes::all();

        //Pagination
        $allProgrammes = Programmes::paginate(20);
        return view('programmes.prog_list',['programmes' => $allProgrammes]);
    }

    // public function showOneProgramme($id){
    //     $programme = Programme::findOrFail($id);
    //   // return view('courses.list', ['courses' => $allCourses]);
    //   return view('programmes.show')
    //           ->with('programme', $programme);
    // }

    public function showAddProgrammePage(){
        return view('programmes.prog_form') 
        ->with('edit', false)
        ->with('programmes', new Programmes);
    }

    public function showEditProgrammePage($id){
        $programmes = Programmes::findOrFail($id);
        return view('programmes.prog_form')
         ->with('edit', true)
         ->with('programmes', $programmes);
    }

    public function saveProgrammes(Request $request){
        // $newProgramme = new programmes();
        // $newProgramme->prog_name = $request->input('prog_name');
        // $newProgramme->prog_id = $request->input('prog_id');
        // $newProgramme->duration = $request->input('duration');

        // $newProgramme->save();

        // return back();
        $request->validate([
            'prog_name' => 'required|min:10|max:100|unique:programmes,prog_name',
            'prog_id' => 'required|min:6|max:20|unique:programmes,prog_id',
            'duration'=> 'required|max:35'
        ],[
            // custom messages
            'unique' => 'This :attribute is already registered in the system'
        ],[
            // custom attribute names
            'name' => 'programme name',
        ]);

        $data = $request->all();
        Programmes::create($data);

        return back();
    }

    // public function updateProgramme(Request $request){
    //     $programmes = Programmes::findOrFail( $request->input('id'));
    //     $programmes->prog_name = $request->input('prog_name');
    //     $programmes->duration = $request->input('duration');
    //     $programmes->prog_id = $request->input('prog_id');
    //     $programmes->save();

    //     return redirect('/programmes');
    // }

    public function deleteProgramme(Request $request){
        $programmes = Programmes::findOrFail( $request->input('id'));
        $programmes->delete();
        session()->flash('alert', $programmes->prog_name. ' deleted successfully');
        return redirect('/programmes');
    }

}


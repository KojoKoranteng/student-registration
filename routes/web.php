<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('layout.master');
});


// Courses
Route::get('/courses', [CourseController::class, 'showAllCourses'])->middleware('auth');
Route::get('/courses/add', [CourseController::class, 'showAddCoursePage']);//->name('createCourse');
Route::get('/courses/{id}', [CourseController::class, 'showOneCourse']);//->name('viewCourse');

Route::get('/courses/{id}/edit', [CourseController::class, 'showEditCoursePage'])->name('updateCourse');
Route::post('/courses', [CourseController::class, 'saveCourse']);
Route::put('/courses', [CourseController::class, 'updateCourse']);
Route::delete('/courses', [CourseController::class, 'deleteCourse']);




// Programmes
Route::get('/programmes', [ProgrammeController::class, 'showProgrammes'])->name('showAllProgrammes')->middleware('auth');
Route::get('/programmes/add', [ProgrammeController::class, 'showAddProgrammePage']);
Route::get('/programmes/{id}', [ProgrammeController::class, 'showOneProgramme'])->name('viewProgramme');
Route::post('/programmes', [ProgrammeController::class, 'saveProgrammes']);


Route::prefix('/students')->group(function(){
    Route::get('/', [StudentController::class, 'showAllStudents'])->name('showAllStudents')->middleware('auth');
    Route::get('/add', [StudentController::class, 'showAddStudentPage'])->name('showAddStudentPage');
    Route::get('/{id}/edit', [StudentController::class, 'showEditStudentPage'])->name('showEditStudentPage');
    Route::get('/{id}', [StudentController::class, 'showAllStudents'])->name('showStudentDetails');

    Route::post('/', [StudentController::class, 'showAllStudents'])->name('saveStudent');
    Route::put('/', [StudentController::class, 'showAllStudents'])->name('updateStudent');
    Route::patch('/', [StudentController::class, 'showAllStudents']);

});

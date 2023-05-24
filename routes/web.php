<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'student-data'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}/students/{student}', [StudentController::class, 'getStudentCoursePage'])->name('student-course');
    Route::post('documents', [DocumentController::class, 'storeStudentDocument'])->name('student-documents.store');
    Route::post('exams', [ExamController::class, 'store'])->name('exams.store');
    Route::get('courses-export', [CourseController::class, 'export'])->name('export-courses');

    Route::middleware('student-data')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    Route::middleware('is_admin')->group(function () {
        Route::resource('faculties', FacultyController::class);
        Route::resource('programs', ProgramController::class)->except(['create']);
        Route::get('/faculties/{faculty}/programs', [ProgramController::class, 'create'])->name('programs.create');
        Route::resource('courses', CourseController::class)->except(['create', 'index']);
        Route::get('/programs/{program}/courses', [CourseController::class, 'create'])->name('courses.create');
    });






});

require __DIR__.'/auth.php';

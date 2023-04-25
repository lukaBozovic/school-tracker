<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //Faculty routes
    /*Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties.index');
    Route::get('/faculties/create', [FacultyController::class, 'create'])->name('faculties.create');
    Route::get('/faculties/{faculty}', [FacultyController::class, 'show'])->name('faculties.show');
    Route::delete('/faculties/{faculty}', [FacultyController::class, 'destroy'])->name('faculties.destroy');
    Route::post('/faculties', [FacultyController::class, 'store'])->name('faculties.store');
    Route::get('/faculties/{faculty}/edit', [FacultyController::class, 'edit'])->name('faculties.edit');
    Route::put('/faculties/{faculty}', [FacultyController::class, 'update'])->name('faculties.update');*/
    //This two things are the same
    Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');

    Route::middleware('is_admin')->group(function () {
        Route::resource('faculties', FacultyController::class);
        Route::resource('programs', ProgramController::class)->except(['create']);
        Route::get('/faculties/{faculty}/programs', [ProgramController::class, 'create'])->name('programs.create');
        Route::resource('courses', CourseController::class)->except(['create']);
        Route::get('/programs/{program}/courses', [CourseController::class, 'create'])->name('courses.create');
    });






});

require __DIR__.'/auth.php';

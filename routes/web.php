<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route for displaying all students
Route::get('/students', [StudentController::class, 'index'])->name('student.index');

// Route for showing the form to create a new student (GET request)
Route::get('/students/create', [StudentController::class, 'create'])->name('student.create');

// Route for handling form submission (POST request)
Route::post('/students/store', [StudentController::class, 'store'])->name('student.store');

// Route for showing the form to edit an existing student (GET request)
Route::get('/students/edit/{StudentID}', [StudentController::class, 'edit'])->name('student.edit');

// Route for handling update form submission (POST request)
Route::post('/students/update/{StudentID}', [StudentController::class, 'update'])->name('student.update');

// Route for deleting a student (GET request)
Route::get('/students/destroy/{StudentID}', [StudentController::class, 'destroy'])->name('student.destroy');



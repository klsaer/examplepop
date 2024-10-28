<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectConroller;
use App\Http\Middleware\Admin;

Route::get('/', [MainController::class, 'show'])->name('home');


Route::get('/first', [MainController::class, 'first'])->name('first');


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

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

    Route::post('/students', [StudentController::class, 'store'])->name('students.store');

    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');

    Route::get('/subjects',[SubjectConroller::class,'index'])->name('subjects.index');
});

Route::middleware(Admin::class)->group(function(){
    Route::get('/admin', function(){
        return view('admin.index');
    })->name('admin.index');
});



require __DIR__ . '/auth.php';

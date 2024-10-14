<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StudentController;

Route::get('/', [MainController::class, 'show'])->name('home');


Route::get('/first',[MainController::class, 'first'] )->name('first');

Route::get('/students',[StudentController::class, 'index'])->name('students.index');
Route::delete('/students/{student}',[StudentController::class, 'destroy'])->name('students.destroy');

Route::post('/students',[StudentController::class,'store'])->name('students.store');

Route::get('/students/{student}',[StudentController::class,'show'])->name('students.show');

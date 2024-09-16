<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'show'])->name('home');


Route::get('/first',[MainController::class, 'first'] )->name('first');

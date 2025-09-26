<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes are defined in routes/auth.php (Breeze/Fortify). Remove test routes.


Route::get('/dashboard', function () {
    return 'Welcome to ProVoltCRM Dashboard! User: ' . auth()->user()->first_name;
})->middleware('auth')->name('dashboard');



// routes/web.php
//Route::get('/dashboard', fn () => view('dashboard'))->middleware('auth')->name('dashboard');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__.'/auth.php';

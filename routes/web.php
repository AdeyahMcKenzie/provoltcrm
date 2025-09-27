<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

// Authentication routes are defined in routes/auth.php (Breeze/Fortify). Remove test routes.

Route::middleware(['web'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});



Route::get('/debug-auth', function () {
    dd(Auth::check(), Auth::user(), session()->all());
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

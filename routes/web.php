<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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



require __DIR__.'/auth.php';

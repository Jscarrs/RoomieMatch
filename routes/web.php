<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;

// -------------------
// Public Pages
// -------------------
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// -------------------
// Admin Pages
// -------------------
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');
});


// -------------------
// Authenticated User Routes
// -------------------
Route::middleware(['auth'])->group(function () {
    // Default Laravel Breeze Dashboard (if you use it)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Custom User Dashboard (your version)
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');
});


// -------------------
// Auth Routes
// -------------------
require __DIR__.'/auth.php';

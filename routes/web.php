<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // 🧭 User Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');

    // 🏠 Listings CRUD
    Route::resource('listings', ListingController::class);

    // 👤 Profile Management (from Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Pages & User Management
|--------------------------------------------------------------------------
|
| All admin-specific routes go here. These are protected by authentication,
| and you could optionally add an "is_admin" middleware later if you want
| to restrict them further.
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // 🛠 Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // 👥 User Management
    Route::post('/user/{id}/reset-password', [AdminDashboardController::class, 'resetPassword'])
        ->name('admin.reset-password');

    Route::patch('/user/{id}/update-role', [AdminDashboardController::class, 'updateRole'])
        ->name('admin.update-role');

    Route::delete('/user/{id}', [AdminDashboardController::class, 'destroy'])
        ->name('admin.delete-user');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes (Login, Register, etc.)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

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
| Public Listing Routes
|--------------------------------------------------------------------------
| These are accessible without login. The show route must stay at the bottom
| so it doesn’t override other “/listings/*” URLs like /listings/create.
|--------------------------------------------------------------------------
*/

// Browse all listings
Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // User Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');

    // Listing Management (Create, Edit, Delete)
    Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
    Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');
    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit');
    Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('listings.update');
    Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Public "Show Listing" Route
|--------------------------------------------------------------------------
| Placed after the auth group to avoid collisions with /listings/create or edit.
|--------------------------------------------------------------------------
*/

Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

/*
|--------------------------------------------------------------------------
| Admin Pages & User Management
|--------------------------------------------------------------------------
| All admin-specific routes are protected by authentication.
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // User Management
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

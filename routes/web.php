<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\FavoriteController; // ✅ Add this line
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
| These pages are accessible without authentication.
|--------------------------------------------------------------------------
*/

// Homepage (main landing page)
Route::view('/', 'home')->name('home');


// Static informational pages
Route::view('/about', 'about')->name('about');

// Contact form (GET + POST)
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'message' => 'required|string|min:10',
    ]);

    // Here you could send an email or store the message in the database.
    return redirect()
        ->route('contact')
        ->with('success', 'Your message has been sent successfully!');
})->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Public Listing Routes
|--------------------------------------------------------------------------
| Guests can view and search listings without logging in.
|--------------------------------------------------------------------------
*/

    // Browse all listings (also used for homepage)
    Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');

    // Move this before the dynamic route so "create" won't be captured as {listing}
    Route::middleware(['auth'])->group(function () {
        Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
        Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');
        Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit');
        Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('listings.update');
        Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');

        // ✅ FAVORITES (New)
        Route::post('/favorites/{listing}/toggle', [FavoriteController::class, 'toggle'])
            ->name('favorites.toggle');
        Route::get('/favorites', [FavoriteController::class, 'index'])
            ->name('favorites.index');
    });

    // View a single listing (must come after static routes)
    Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
| Routes that require login (create, edit, delete, profile, favorites, etc.)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // User Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');

    // Listing Management
    Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
    Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');
    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit');
    Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('listings.update');
    Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');

    // ✅ FAVORITES (New)
    Route::post('/favorites/{listing}/toggle', [FavoriteController::class, 'toggle'])
        ->name('favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])
        ->name('favorites.index');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Pages & User Management
|--------------------------------------------------------------------------
| Protected by authentication (and typically admin middleware if you have one).
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

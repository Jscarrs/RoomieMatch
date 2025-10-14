<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function() { return view('home'); })->name('home');
Route::get('/about', function() { return view('about'); })->name('about');
Route::get('/contact', function() { return view('contact'); })->name('contact');

// Admin Routes
Route::prefix('admin')->group(function() {
    Route::get('/', function() { return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('/users', function() { return view('admin.users'); })->name('admin.users');
});


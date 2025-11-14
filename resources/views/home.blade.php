@extends('layouts.public')
@section('title', 'Home')
@section('content')

<!-- Hero Section -->
<section class="text-center bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg mb-8">
    <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-4">Find Your Perfect Roommate</h1>
    <p class="text-xl text-gray-600 dark:text-gray-300 mb-6">RoomieMatch helps students find compatible roommates and affordable housing near campus.</p>
    <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 bg-emerald-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        Learn More
    </a>
</section>

<!-- Features Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Card 1 -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-xl transition duration-300">
        <div class="mb-4">
            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
        </div>
        <h5 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Find Compatible Roommates</h5>
        <p class="text-gray-600 dark:text-gray-300">Set preferences, filter by lifestyle, and find a roommate that matches your needs.</p>
    </div>

    <!-- Card 2 -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-xl transition duration-300">
        <div class="mb-4">
            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
        </div>
        <h5 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Post and Browse Housing</h5>
        <p class="text-gray-600 dark:text-gray-300">Check available rooms and apartments near campus and make your living arrangements easier.</p>
    </div>
</div>

<!-- Call to Action -->
<div class="mt-12 text-center bg-emerald-600 dark:bg-green-700 p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-white mb-4">Ready to Find Your Perfect Match?</h2>
    <p class="text-green-100 mb-6">Join thousands of students who have found their ideal roommates through RoomieMatch.</p>
    <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 bg-white border border-transparent rounded-md font-semibold text-sm text-green-600 uppercase tracking-widest hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition ease-in-out duration-150">
        Get Started Today
    </a>
</div>

@endsection
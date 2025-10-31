@extends('layouts.app')

@section('content')
<section class="bg-gray-900 min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white">Available Listings</h1>
                <p class="text-gray-400 mt-1">Browse housing options from other students near your campus.</p>
            </div>

            @auth
                <a href="{{ route('listings.create') }}"
                   class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition shadow">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    New Listing
                </a>
            @endauth
        </div>

        @if($listings->count())
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($listings as $listing)
                    <div class="bg-gray-800 border border-gray-700 rounded-2xl p-6 shadow hover:border-emerald-500 transition">
                        <div class="aspect-[4/3] bg-gray-700 rounded-lg mb-4 flex items-center justify-center">
                            <span class="text-gray-500 text-sm">No image</span>
                        </div>

                        <h2 class="text-xl font-semibold text-white mb-1">{{ $listing->title }}</h2>
                        <p class="text-gray-400 text-sm mb-2">{{ Str::limit($listing->address, 50) }}</p>

                        <p class="text-emerald-400 font-bold text-lg mb-4">${{ number_format($listing->price) }}/month</p>

                        <div class="flex flex-wrap gap-2 mb-4">
                            @if ($listing->ensuite_washroom)
                                <span class="bg-gray-700 px-2 py-1 rounded-full text-xs text-gray-300">Ensuite</span>
                            @endif
                            @if ($listing->pet_friendly)
                                <span class="bg-gray-700 px-2 py-1 rounded-full text-xs text-gray-300">Pet Friendly</span>
                            @endif
                            @if ($listing->lease_type)
                                <span class="bg-gray-700 px-2 py-1 rounded-full text-xs text-gray-300">{{ $listing->lease_type }}</span>
                            @endif
                        </div>

                        <a href="{{ route('listings.show', $listing) }}"
                           class="block text-center bg-emerald-600 text-white py-2 rounded-lg hover:bg-emerald-700 transition">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $listings->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <h2 class="text-gray-300 text-xl mb-2">No listings found</h2>
                <p class="text-gray-500">Be the first to post a listing in your area.</p>
            </div>
        @endif
    </div>
</section>
@endsection

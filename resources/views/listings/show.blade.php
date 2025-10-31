@extends('layouts.app')

@section('content')
<section class="bg-gray-900 min-h-screen py-10">
    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-gray-800 border border-gray-700 rounded-2xl shadow-xl p-8">
            <div class="flex flex-col lg:flex-row lg:items-start lg:gap-10">

                {{-- Left Column (image placeholder) --}}
                <div class="lg:w-1/2 mb-6 lg:mb-0">
                    <div class="aspect-[4/3] bg-gray-700 rounded-xl overflow-hidden flex items-center justify-center">
                        <span class="text-gray-500 text-sm">No image uploaded</span>
                    </div>
                </div>

                {{-- Right Column (details) --}}
                <div class="lg:w-1/2 space-y-4">
                    <h1 class="text-3xl font-bold text-white">{{ $listing->title }}</h1>
                    <p class="text-gray-400">{{ $listing->address }}</p>

                    <p class="text-emerald-400 text-2xl font-semibold">${{ number_format($listing->price) }} <span class="text-sm text-gray-400">/month</span></p>

                    <div class="flex flex-wrap gap-2 text-xs mt-3">
                        @if ($listing->ensuite_washroom)
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-gray-300">Ensuite</span>
                        @endif
                        @if ($listing->pet_friendly)
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-gray-300">Pet Friendly</span>
                        @endif
                        <span class="bg-gray-700 px-3 py-1 rounded-full text-gray-300">{{ $listing->lease_type }}</span>
                        <span class="bg-gray-700 px-3 py-1 rounded-full text-gray-300">{{ $listing->property_type }}</span>
                    </div>

                    <div class="border-t border-gray-700 my-6"></div>

                    <div>
                        <h2 class="text-lg font-semibold text-white mb-2">Description</h2>
                        <p class="text-gray-300 leading-relaxed whitespace-pre-line">{{ $listing->description ?? 'No description provided.' }}</p>
                    </div>

                    <div class="border-t border-gray-700 my-6"></div>

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div>
                            <p class="text-sm text-gray-400">Listed by:</p>
                            <p class="text-gray-100 font-medium">{{ $listing->user->name ?? 'Unknown User' }}</p>
                        </div>
                        <div class="flex gap-3">
                            <a href="#" 
                               class="px-4 py-2 bg-emerald-600 text-white text-sm rounded-lg hover:bg-emerald-500 transition">
                                Contact Owner
                            </a>
                            <a href="#" 
                               class="px-4 py-2 bg-gray-700 text-gray-200 text-sm rounded-lg hover:bg-gray-600 transition">
                                Add to Favourites
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('listings.index') }}" class="text-emerald-400 hover:text-emerald-300 text-sm">
                ← Back to Listings
            </a>
        </div>

    </div>
</section>
@endsection

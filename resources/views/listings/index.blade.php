@extends('layouts.app')

@section('content')
<section class="bg-gray-900 min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
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

        <!-- 🔍 Filter Bar -->
        <form action="{{ route('listings.index') }}" method="GET" class="bg-gray-800 p-6 rounded-2xl mb-8 shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">

                <!-- Search -->
                <div>
                    <label class="text-sm text-gray-300">Search</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="e.g., Waterloo, apartment..."
                           class="w-full p-2 bg-gray-900 border border-gray-700 rounded-lg text-gray-100">
                </div>

                <!-- Min Price -->
                <div>
                    <label class="text-sm text-gray-300">Min Price</label>
                    <input type="number" name="min_price" value="{{ request('min_price') }}"
                           placeholder="0"
                           class="w-full p-2 bg-gray-900 border border-gray-700 rounded-lg text-gray-100">
                </div>

                <!-- Max Price -->
                <div>
                    <label class="text-sm text-gray-300">Max Price</label>
                    <input type="number" name="max_price" value="{{ request('max_price') }}"
                           placeholder="2000"
                           class="w-full p-2 bg-gray-900 border border-gray-700 rounded-lg text-gray-100">
                </div>

                <!-- Lease Type -->
                <div>
                    <label class="text-sm text-gray-300">Lease Type</label>
                    <select name="lease_type" class="w-full p-2 bg-gray-900 border border-gray-700 rounded-lg text-gray-100">
                        <option value="">Any</option>
                        <option value="8-month" {{ request('lease_type') == '8-month' ? 'selected' : '' }}>8-month</option>
                        <option value="1-year" {{ request('lease_type') == '1-year' ? 'selected' : '' }}>1-year</option>
                        <option value="Month-to-month" {{ request('lease_type') == 'Month-to-month' ? 'selected' : '' }}>Month-to-month</option>
                    </select>
                </div>

                <!-- Property Type -->
                <div>
                    <label class="text-sm text-gray-300">Property Type</label>
                    <select name="property_type" class="w-full p-2 bg-gray-900 border border-gray-700 rounded-lg text-gray-100">
                        <option value="">Any</option>
                        <option value="House" {{ request('property_type') == 'House' ? 'selected' : '' }}>House</option>
                        <option value="Apartment" {{ request('property_type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                        <option value="Condo" {{ request('property_type') == 'Condo' ? 'selected' : '' }}>Condo</option>
                        <option value="Basement" {{ request('property_type') == 'Basement' ? 'selected' : '' }}>Basement</option>
                    </select>
                </div>

                <!-- Gender Preference -->
                <div>
                    <label class="text-sm text-gray-300">Gender Preference</label>
                    <select name="gender_preference" class="w-full p-2 bg-gray-900 border border-gray-700 rounded-lg text-gray-100">
                        <option value="">Any</option>
                        <option value="Male" {{ request('gender_preference') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ request('gender_preference') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Coed" {{ request('gender_preference') == 'Coed' ? 'selected' : '' }}>Coed</option>
                    </select>
                </div>

                <!-- Checkboxes -->
                <div class="flex items-center gap-4">
                    <label class="flex items-center text-gray-300">
                        <input type="checkbox" name="ensuite_washroom" value="1"
                               {{ request('ensuite_washroom') ? 'checked' : '' }} class="mr-2">
                        Ensuite
                    </label>
                    <label class="flex items-center text-gray-300">
                        <input type="checkbox" name="pet_friendly" value="1"
                               {{ request('pet_friendly') ? 'checked' : '' }} class="mr-2">
                        Pet Friendly
                    </label>
                </div>

                <!-- Sort -->
                <div>
                    <label class="text-sm text-gray-300">Sort By</label>
                    <select name="sort" class="w-full p-2 bg-gray-900 border border-gray-700 rounded-lg text-gray-100">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Most Recent</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('listings.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition">Clear</a>
                <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">Show Results</button>
            </div>
        </form>

        <!-- 🔽 Listings -->
        @if($listings->count())
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($listings as $listing)
                    <div class="bg-gray-800 border border-gray-700 rounded-2xl p-6 shadow hover:border-emerald-500 transition">

                        <!-- Listing Image -->
                        @if ($listing->photos && count(json_decode($listing->photos, true)) > 0)
                            <div class="aspect-[4/3] w-full overflow-hidden rounded-2xl bg-gray-700">
                                <img src="{{ asset('storage/' . json_decode($listing->photos, true)[0]) }}"
                                     alt="{{ $listing->title }}"
                                     class="w-full h-full object-cover object-center rounded-2xl transition-transform duration-300 hover:scale-105">
                            </div>
                        @else
                            <div class="aspect-[4/3] w-full bg-gray-700 flex items-center justify-center rounded-2xl">
                                <span class="text-gray-400">No image</span>
                            </div>
                        @endif

                        <!-- Title -->
                        <h2 class="text-xl font-semibold text-white mt-3 mb-1">{{ $listing->title }}</h2>
                        <p class="text-gray-400 text-sm mb-2">{{ Str::limit($listing->address, 50) }}</p>

                        <!-- Price -->
                        <p class="text-emerald-400 font-bold text-lg mb-4">
                            ${{ number_format($listing->price) }}/month
                        </p>

                        <!-- Badges -->
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
                            @if ($listing->gender_preference)
                                <span class="bg-gray-700 px-2 py-1 rounded-full text-xs text-gray-300">{{ $listing->gender_preference }}</span>
                            @endif
                        </div>

                        <!-- Button -->
                        <a href="{{ route('listings.show', $listing) }}"
                           class="block text-center bg-emerald-600 text-white py-2 rounded-lg hover:bg-emerald-700 transition">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $listings->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <h2 class="text-gray-300 text-xl mb-2">No listings found</h2>
                <p class="text-gray-500">Try adjusting your filters or check back later.</p>
            </div>
        @endif
    </div>
</section>

<!-- 🧠 Optional: Auto-submit filters when changed -->
<script>
    document.querySelectorAll('input, select').forEach(el => {
        el.addEventListener('change', () => el.form.submit());
    });
</script>
@endsection

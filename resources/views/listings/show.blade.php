@extends('layouts.app')

@section('content')
<section class="bg-gray-900 text-gray-100 min-h-screen py-10">
    <div class="max-w-5xl mx-auto px-6">

        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-600/20 text-emerald-400 rounded-lg border border-emerald-600/30">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-800 rounded-2xl shadow-lg p-8 flex flex-col md:flex-row gap-8">
            <div class="md:w-1/2">
                @if ($listing->photos && count(json_decode($listing->photos, true)) > 0)
                    <img src="{{ asset('storage/' . json_decode($listing->photos, true)[0]) }}"
                        alt="Listing Photo"
                        class="rounded-lg w-full h-80 object-cover">
                @else
                    <div class="w-full h-80 bg-gray-700 rounded-lg flex items-center justify-center">
                        <span class="text-gray-400">No image uploaded</span>
                    </div>
                @endif
            </div>

            <div class="md:w-1/2 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">{{ $listing->title }}</h1>
                    <p class="text-gray-400 mb-4">{{ $listing->address }}</p>
                    <p class="text-emerald-400 font-bold text-2xl mb-2">
                        ${{ number_format($listing->price) }} 
                        <span class="text-sm text-gray-400">/month</span>
                    </p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        @if ($listing->lease_type)
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-xs">{{ $listing->lease_type }}</span>
                        @endif
                        @if ($listing->property_type)
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-xs">{{ $listing->property_type }}</span>
                        @endif
                        @if ($listing->ensuite_washroom)
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-xs">Ensuite</span>
                        @endif
                        @if ($listing->pet_friendly)
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-xs">Pet Friendly</span>
                        @endif
                        @if ($listing->gender_preference)
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-xs">
                                {{ $listing->gender_preference }}
                            </span>
                        @endif
                    </div>

                    @if ($listing->bathrooms)
                        <p class="text-gray-300 mb-2">
                            <strong>Bathrooms:</strong> {{ $listing->bathrooms }}
                        </p>
                    @endif

                    <h2 class="text-lg font-semibold mb-1">Description</h2>
                    <p class="text-gray-300 mb-6">{{ $listing->description ?? 'No description provided.' }}</p>

                    <p class="text-sm text-gray-500">
                        Listed by: 
                        <span class="text-gray-300 font-medium">{{ $listing->user->name ?? 'Unknown User' }}</span>
                    </p>
                </div>

                <div class="flex gap-4 mt-6">
                    <a href="#" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                        Contact Owner
                    </a>
                    <a href="#" class="px-4 py-2 bg-gray-700 text-gray-200 rounded-lg hover:bg-gray-600 transition">
                        Add to Favourites
                    </a>
                </div>
            </div>
        </div>

        @auth
            @if ($listing->user_id === auth()->id())
                <div x-data="{ open: false }" class="mt-8 flex gap-4">
                    <button @click="open = true"
                        class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                        Edit Listing
                    </button>

                    <form action="{{ route('listings.destroy', $listing) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this listing?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            Delete Listing
                        </button>
                    </form>

                    <div x-show="open" x-transition.opacity
                        class="fixed inset-0 flex items-center justify-center bg-black/70 z-50">
                        <div class="bg-gray-800 p-6 rounded-2xl w-full sm:w-11/12 md:w-3/4 lg:w-2/5 xl:w-2/6 
                                    max-h-[90vh] overflow-y-auto shadow-xl border border-gray-700">
                            <button @click="open = false"
                                class="absolute top-3 right-4 text-gray-400 hover:text-white text-2xl">&times;</button>
                            <h2 class="text-2xl font-bold text-white mb-4">Edit Listing</h2>

                            <form action="{{ route('listings.update', $listing) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('listings.partials.form', ['listing' => $listing])

                                <div class="mt-4 flex justify-end gap-4">
                                    <button type="button" @click="open = false"
                                        class="px-4 py-2 bg-gray-700 text-gray-200 rounded-lg hover:bg-gray-600 transition">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endauth

        <div class="mt-8">
            <a href="{{ route('listings.index') }}" class="text-emerald-400 hover:underline">
                ← Back to Listings
            </a>
        </div>
    </div>
</section>
@endsection

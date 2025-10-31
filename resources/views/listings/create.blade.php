@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6 text-gray-900">Create a New Listing</h1>

    <form action="{{ route('listings.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
            <input type="text" name="title" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>
        </div>

        <!-- Address -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
            <input type="text" name="address" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>
        </div>

        <!-- Price -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Price (per month)</label>
            <input type="number" name="price" min="0" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>
        </div>

        <!-- Lease Type -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Lease Type</label>
            <select name="lease_type" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                <option value="4-month">4 Month Sublet</option>
                <option value="8-month">8 Month Sublet</option>
                <option value="lease">Full Lease</option>
            </select>
        </div>

        <!-- Property Type -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Property Type</label>
            <select name="property_type" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                <option value="apartment">Apartment</option>
                <option value="house">House</option>
            </select>
        </div>

        <!-- Ensuite Washroom -->
        <div class="flex items-center">
            <input type="checkbox" name="ensuite_washroom" id="ensuite_washroom" value="1" class="h-4 w-4 text-emerald-600 border-gray-300 rounded">
            <label for="ensuite_washroom" class="ml-2 text-sm text-gray-700">Ensuite Washroom</label>
        </div>

        <!-- Pet Friendly -->
        <div class="flex items-center">
            <input type="checkbox" name="pet_friendly" id="pet_friendly" value="1" class="h-4 w-4 text-emerald-600 border-gray-300 rounded">
            <label for="pet_friendly" class="ml-2 text-sm text-gray-700">Pet Friendly</label>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500"></textarea>
        </div>

        <!-- Submit -->
        <div class="pt-4">
            <button type="submit" class="px-6 py-3 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700">
                Publish Listing
            </button>
        </div>
    </form>
</div>
@endsection

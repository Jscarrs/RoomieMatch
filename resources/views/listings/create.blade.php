@extends('layouts.app')

@section('content')
<section class="bg-gray-900 text-gray-100 min-h-screen">
    <div class="max-w-3xl mx-auto px-6 py-10">
        <div class="bg-gray-800 rounded-2xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-center mb-6">Create a New Listing</h1>

            @if ($errors->any())
                <div class="mb-4 bg-red-500/10 text-red-400 p-4 rounded-lg border border-red-500/20">
                    <ul class="list-disc pl-6 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('listings.store') }}" class="space-y-6">
                @csrf

                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-emerald-500 focus:outline-none text-gray-100"
                           placeholder="Spacious 2 Bedroom Apartment near Humber College" required>
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium mb-1">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-emerald-500 focus:outline-none text-gray-100"
                           placeholder="123 Main Street, Toronto, ON" required>
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-medium mb-1">Price (per month)</label>
                    <input type="number" name="price" value="{{ old('price') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-emerald-500 focus:outline-none text-gray-100"
                           placeholder="1350" required>
                </div>

                <!-- Lease Type -->
                <div>
                    <label class="block text-sm font-medium mb-1">Lease Type</label>
                    <select name="lease_type"
                            class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="">Select Lease Type</option>
                        <option value="Month-to-Month">Month-to-Month</option>
                        <option value="6 Months">6 Months</option>
                        <option value="1 Year">1 Year</option>
                    </select>
                </div>

                <!-- Property Type -->
                <div>
                    <label class="block text-sm font-medium mb-1">Property Type</label>
                    <select name="property_type"
                            class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="">Select Property Type</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Basement">Basement</option>
                        <option value="Shared Room">Shared Room</option>
                        <option value="Private Room">Private Room</option>
                    </select>
                </div>

                <!-- Checkboxes -->
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="ensuite_washroom" class="accent-emerald-500">
                        <span>Ensuite Washroom</span>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="pet_friendly" class="accent-emerald-500">
                        <span>Pet Friendly</span>
                    </label>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium mb-1">Description</label>
                    <textarea name="description" rows="4"
                              class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-emerald-500 focus:outline-none text-gray-100"
                              placeholder="Describe the space, nearby transit, roommates, etc.">{{ old('description') }}</textarea>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit"
                            class="px-6 py-2 bg-emerald-600 text-white font-semibold rounded-lg hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-500 transition">
                        Publish Listing
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

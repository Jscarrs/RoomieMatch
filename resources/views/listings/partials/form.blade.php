<!-- Title -->
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-300 mb-2">Title</label>
    <input type="text" name="title"
        value="{{ old('title', $listing->title ?? '') }}"
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100"
        required>
</div>

<!-- Address -->
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-300 mb-2">Address</label>
    <input type="text" name="address"
        value="{{ old('address', $listing->address ?? '') }}"
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100"
        required>
</div>

<!-- Price -->
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-300 mb-2">Price (per month)</label>
    <input type="number" name="price" step="0.01"
        value="{{ old('price', $listing->price ?? '') }}"
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100"
        required>
</div>

<!-- Lease Type -->
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-300 mb-2">Lease Type</label>
    <select name="lease_type" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100" required>
        <option value="8-month" {{ old('lease_type', $listing->lease_type ?? '') == '8-month' ? 'selected' : '' }}>8-month</option>
        <option value="1-year" {{ old('lease_type', $listing->lease_type ?? '') == '1-year' ? 'selected' : '' }}>1-year</option>
        <option value="Month-to-month" {{ old('lease_type', $listing->lease_type ?? '') == 'Month-to-month' ? 'selected' : '' }}>Month-to-month</option>
    </select>
</div>

<!-- Property Type -->
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-300 mb-2">Property Type</label>
    <select name="property_type" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100" required>
        <option value="House" {{ old('property_type', $listing->property_type ?? '') == 'House' ? 'selected' : '' }}>House</option>
        <option value="Apartment" {{ old('property_type', $listing->property_type ?? '') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
        <option value="Condo" {{ old('property_type', $listing->property_type ?? '') == 'Condo' ? 'selected' : '' }}>Condo</option>
        <option value="Basement" {{ old('property_type', $listing->property_type ?? '') == 'Basement' ? 'selected' : '' }}>Basement</option>
    </select>
</div>

<!-- Gender Preference -->
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-300 mb-2">Gender Preference</label>
    <select name="gender_preference" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100" required>
        <option value="Male" {{ old('gender_preference', $listing->gender_preference ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('gender_preference', $listing->gender_preference ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Coed" {{ old('gender_preference', $listing->gender_preference ?? '') == 'Coed' ? 'selected' : '' }}>Coed</option>
    </select>
</div>

<!-- Bathrooms -->
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-300 mb-2">Number of Bathrooms (optional)</label>
    <input type="number" step="0.5" name="bathrooms"
        value="{{ old('bathrooms', $listing->bathrooms ?? '') }}"
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100">
</div>

<!-- Options -->
<div class="flex items-center gap-4 mb-4">
    <label class="flex items-center text-gray-300">
        <input type="checkbox" name="ensuite_washroom"
            {{ old('ensuite_washroom', $listing->ensuite_washroom ?? false) ? 'checked' : '' }}
            class="mr-2">
        Ensuite Washroom
    </label>

    <label class="flex items-center text-gray-300">
        <input type="checkbox" name="pet_friendly"
            {{ old('pet_friendly', $listing->pet_friendly ?? false) ? 'checked' : '' }}
            class="mr-2">
        Pet Friendly
    </label>
</div>

<!-- Description -->
<div class="mb-6">
    <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
    <textarea name="description" rows="4"
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100">{{ old('description', $listing->description ?? '') }}</textarea>
</div>

<!-- Upload Photo -->
<div class="mb-6">
    <label class="block text-sm font-medium text-gray-300 mb-2">Upload Photo</label>
    <input 
        type="file" 
        name="photo" 
        class="w-full text-gray-300 bg-gray-800 border border-gray-700 rounded-lg p-2"
    >

    @if (!empty($listing?->photos))
        <p class="mt-3 text-sm text-gray-400">Current Photo:</p>
        <img 
            src="{{ asset('storage/' . json_decode($listing->photos, true)[0]) }}" 
            alt="Current Listing Photo"
            class="mt-2 w-32 h-32 object-cover rounded-lg border border-gray-700"
        >
    @endif
</div>

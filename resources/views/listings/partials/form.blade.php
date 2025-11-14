<!-- Title -->
<div class="mb-4">
    <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Title</label>
    <input 
        id="title"
        type="text" 
        name="title" 
        value="{{ old('title', $listing->title ?? '') }}"
        placeholder="e.g., Spacious room near downtown"
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100 placeholder-gray-500"
        required
    >
</div>

<!-- Address -->
<div class="mb-4">
    <label for="address" class="block text-sm font-medium text-gray-300 mb-2">Address</label>
    <input 
        id="address"
        type="text" 
        name="address" 
        value="{{ old('address', $listing->address ?? '') }}"
        placeholder="e.g., 123 Main Street, Toronto, ON"
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100 placeholder-gray-500"
        required
    >
</div>

<!-- Price -->
<div class="mb-4">
    <label for="price" class="block text-sm font-medium text-gray-300 mb-2">Price (per month)</label>
    <input 
        id="price"
        type="number" 
        name="price" 
        step="0.01"
        value="{{ old('price', $listing->price ?? '') }}"
        placeholder="Enter monthly rent amount"
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100 placeholder-gray-500"
        required
    >
</div>

<!-- Lease Type -->
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-300 mb-2">Lease Type</label>
    <select 
        name="lease_type" 
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100"
        required
    >
        <option value="">Select Lease Type</option>
        <option value="Month-to-month" {{ old('lease_type', $listing->lease_type ?? '') == 'Month-to-month' ? 'selected' : '' }}>Month-to-month</option>
        <option value="4-month" {{ old('lease_type', $listing->lease_type ?? '') == '4-month' ? 'selected' : '' }}>4-month</option>
        <option value="8-month" {{ old('lease_type', $listing->lease_type ?? '') == '8-month' ? 'selected' : '' }}>8-month</option>
        <option value="1-year" {{ old('lease_type', $listing->lease_type ?? '') == '1-year' ? 'selected' : '' }}>1-year</option>
    </select>
</div>


<!-- Property Type -->
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-300 mb-2">Property Type</label>
    <select 
        name="property_type" 
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100"
        required
    >
        <option value="">Select Property Type</option>
        <option value="Apartment" {{ old('property_type', $listing->property_type ?? '') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
        <option value="Condo" {{ old('property_type', $listing->property_type ?? '') == 'Condo' ? 'selected' : '' }}>Condo</option>
        <option value="House" {{ old('property_type', $listing->property_type ?? '') == 'House' ? 'selected' : '' }}>House</option>
        <option value="Basement" {{ old('property_type', $listing->property_type ?? '') == 'Basement' ? 'selected' : '' }}>Basement</option>
        <option value="Townhouse" {{ old('property_type', $listing->property_type ?? '') == 'Townhouse' ? 'selected' : '' }}>Townhouse</option>
    </select>
</div>


<!-- Gender Preference -->
<div class="mb-4">
    <label for="gender_preference" class="block text-sm font-medium text-gray-300 mb-2">Gender Preference</label>
    <select 
        id="gender_preference"
        name="gender_preference" 
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100"
        required
    >
        <option value="Male" {{ old('gender_preference', $listing->gender_preference ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('gender_preference', $listing->gender_preference ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Coed" {{ old('gender_preference', $listing->gender_preference ?? '') == 'Coed' ? 'selected' : '' }}>Coed / Mixed</option>
    </select>
</div>

<!-- Bathrooms -->
<div class="mb-4">
    <label for="bathrooms" class="block text-sm font-medium text-gray-300 mb-2">Number of Bathrooms (optional)</label>
    <input 
        id="bathrooms"
        type="number" 
        step="0.5" 
        name="bathrooms" 
        value="{{ old('bathrooms', $listing->bathrooms ?? '') }}"
        placeholder="e.g., 1, 1.5, 2"
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100 placeholder-gray-500"
    >
</div>

<!-- Options -->
<div class="flex flex-wrap items-center gap-6 mb-6">
    <label class="flex items-center text-gray-300">
        <input 
            type="checkbox" 
            name="ensuite_washroom" 
            {{ old('ensuite_washroom', $listing->ensuite_washroom ?? false) ? 'checked' : '' }} 
            class="mr-2 rounded border-gray-600 bg-gray-800 focus:ring-emerald-500"
        >
        Ensuite Washroom
    </label>

    <label class="flex items-center text-gray-300">
        <input 
            type="checkbox" 
            name="pet_friendly" 
            {{ old('pet_friendly', $listing->pet_friendly ?? false) ? 'checked' : '' }} 
            class="mr-2 rounded border-gray-600 bg-gray-800 focus:ring-emerald-500"
        >
        Pet Friendly
    </label>
</div>

<!-- Description -->
<div class="mb-6">
    <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
    <textarea 
        id="description"
        name="description" 
        rows="4"
        placeholder="Describe the room, location, amenities, etc."
        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100 placeholder-gray-500"
    >{{ old('description', $listing->description ?? '') }}</textarea>
</div>

<!-- Upload Photo -->
<div class="mb-6">
    <label for="photo" class="block text-sm font-medium text-gray-300 mb-2">Upload Photo</label>
    <input 
        id="photo"
        type="file" 
        name="photo" 
        accept="image/*"
        class="w-full text-gray-300 bg-gray-800 border border-gray-700 rounded-lg p-2"
    >

    @if(!empty($listing?->photos))
        @php $photo = json_decode($listing->photos, true)[0] ?? null; @endphp
        @if($photo)
            <div class="mt-3">
                <p class="text-gray-400 text-sm mb-2">Current Photo:</p>
                <img src="{{ asset('storage/' . $photo) }}" alt="Listing Photo" class="w-40 h-32 object-cover rounded-lg border border-gray-700">
            </div>
        @endif
    @endif
</div>

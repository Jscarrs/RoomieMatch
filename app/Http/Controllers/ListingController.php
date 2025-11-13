<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Listing::query();

        if ($request->filled('lease_type')) {
            $query->where('lease_type', $request->lease_type);
        }

        if ($request->filled('property_type')) {
            $query->where('property_type', $request->property_type);
        }

        if ($request->boolean('ensuite_washroom')) {
            $query->where('ensuite_washroom', true);
        }

        if ($request->boolean('pet_friendly')) {
            $query->where('pet_friendly', true);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $listings = $query->latest()->paginate(10);

        return view('listings.index', compact('listings'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'lease_type' => 'required|string',
            'property_type' => 'required|string',
            'gender_preference' => 'required|string|in:Male,Female,Coed',
            'bathrooms' => 'nullable|numeric|min:0|max:10',
            'description' => 'nullable|string',
            'ensuite_washroom' => 'nullable',
            'pet_friendly' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['ensuite_washroom'] = $request->has('ensuite_washroom');
        $validated['pet_friendly'] = $request->has('pet_friendly');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('listings', 'public');
            $validated['photos'] = json_encode([$path]);
        }

        Listing::create($validated);

        return redirect()->route('listings.index')->with('success', 'Listing created successfully.');
    }

    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', compact('listing'));
    }

    public function update(Request $request, Listing $listing)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'lease_type' => 'required|string',
            'property_type' => 'required|string',
            'gender_preference' => 'required|string|in:Male,Female,Coed',
            'bathrooms' => 'nullable|numeric|min:0|max:10',
            'description' => 'nullable|string',
            'ensuite_washroom' => 'nullable',
            'pet_friendly' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $validated['ensuite_washroom'] = $request->has('ensuite_washroom');
        $validated['pet_friendly'] = $request->has('pet_friendly');

        if ($request->hasFile('photo')) {
            if ($listing->photos) {
                $oldPhotos = json_decode($listing->photos, true);
                foreach ($oldPhotos as $oldPhoto) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }

            $path = $request->file('photo')->store('listings', 'public');
            $validated['photos'] = json_encode([$path]);
        }

        $listing->update($validated);

        return redirect()->route('listings.index')->with('success', 'Listing updated successfully.');
    }

    public function destroy(Listing $listing)
    {
        if ($listing->photos) {
            $photos = json_decode($listing->photos, true);
            foreach ($photos as $photo) {
                Storage::disk('public')->delete($photo);
            }
        }

        $listing->delete();
        return redirect()->route('listings.index')->with('success', 'Listing deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    /**
     * Display a list of listings with filters.
     */
    public function index(Request $request)
    {
        $query = Listing::query();

        // Optional filters
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

    /**
     * Show the form for creating a new listing.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created listing in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'lease_type' => 'required|string',
            'property_type' => 'required|string',
            'bathrooms' => 'nullable|numeric|min:0|max:10',
            'description' => 'nullable|string',
            'ensuite_washroom' => 'boolean',
            'pet_friendly' => 'boolean',
            'photos' => 'nullable|json', // future-ready
        ]);

        $validated['user_id'] = Auth::id();

        Listing::create($validated);

        return redirect()->route('listings.index')->with('success', 'Listing created successfully!');
    }

    /**
     * Display a single listing.
     */
    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    /**
     * Edit listing (for later use)
     */
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
            'bathrooms' => 'nullable|numeric|min:0|max:10',
            'description' => 'nullable|string',
            'ensuite_washroom' => 'boolean',
            'pet_friendly' => 'boolean',
            'photos' => 'nullable|json',
        ]);

        $listing->update($validated);

        return redirect()->route('listings.index')->with('success', 'Listing updated successfully!');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->route('listings.index')->with('success', 'Listing deleted successfully!');
    }
}

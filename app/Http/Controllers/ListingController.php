<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    /**
     * Middleware — restrict create/edit/delete to logged-in users only
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display listings with optional filters and search.
     */
    public function index(Request $request)
    {
        $query = Listing::query();

        // ✅ Partial search: title, address, description
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('address', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // ✅ Price range filters
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // ✅ Dropdown filters
        foreach (['lease_type', 'property_type', 'gender_preference'] as $filter) {
            if ($request->filled($filter)) {
                $query->where($filter, $request->$filter);
            }
        }

        // ✅ Checkbox filters
        if ($request->boolean('ensuite_washroom')) {
            $query->where('ensuite_washroom', true);
        }
        if ($request->boolean('pet_friendly')) {
            $query->where('pet_friendly', true);
        }

        // ✅ Sorting logic
        switch ($request->input('sort')) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->latest(); // Most recent listings first
                break;
        }

        // ✅ Paginate results (with query string to persist filters)
        $listings = $query->paginate(9)->withQueryString();

        return view('listings.index', compact('listings'));
    }

    /**
     * Show form to create a new listing.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created listing.
     */
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

        // ✅ Handle image upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('listings', 'public');
            $validated['photos'] = json_encode([$path]);
        }

        Listing::create($validated);

        return redirect()->route('listings.index')->with('success', 'Listing created successfully!');
    }

    /**
     * Display a specific listing.
     */
    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    /**
     * Show the form for editing a listing (owner only).
     */
    public function edit(Listing $listing)
    {
        if ($listing->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('listings.edit', compact('listing'));
    }

    /**
     * Update an existing listing (owner only).
     */
    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

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

        // ✅ Replace photo if a new one is uploaded
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

        return redirect()->route('listings.show', $listing)->with('success', 'Listing updated successfully!');
    }

    /**
     * Delete a listing (owner only).
     */
    public function destroy(Listing $listing)
    {
        if ($listing->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // ✅ Delete photos from storage
        if ($listing->photos) {
            $photos = json_decode($listing->photos, true);
            foreach ($photos as $photo) {
                Storage::disk('public')->delete($photo);
            }
        }

        // ✅ Permanently delete record
        $listing->delete();

        return redirect()->route('listings.index')->with('success', 'Listing deleted successfully!');
    }
}

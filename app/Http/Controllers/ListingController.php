<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

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

        // Price filtering
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Fetch latest listings
        $listings = $query->latest()->paginate(10);

        // Return view
        return view('listings.index', compact('listings'));
    }
}

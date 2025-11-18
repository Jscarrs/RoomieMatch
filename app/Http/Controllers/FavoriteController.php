<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // Toggle favorite on/off
    public function toggle(Listing $listing)
    {
        $user = Auth::user();

        // Check if already favorited
        $existing = Favorite::where('user_id', $user->id)
                            ->where('listing_id', $listing->id)
                            ->first();

        if ($existing) {
            $existing->delete();
            $message = 'Removed from favorites.';
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'listing_id' => $listing->id,
            ]);
            $message = 'Added to favorites!';
        }

        return redirect()->back()->with('success', $message);
    }

    // Show all favorite listings
    public function index()
    {
        $favorites = Auth::user()->favoriteListings()->get();
        return view('favorites.index', compact('favorites'));
    }
}

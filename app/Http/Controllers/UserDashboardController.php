<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Message;
use App\Models\Favorite;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Stat cards
        $myListingsCount = Listing::where('user_id', $user->id)->count();
        $messagesCount   = Message::where('receiver_id', $user->id)
                                  ->whereNull('read_at')
                                  ->count();
        $favoritesCount  = Favorite::where('user_id', $user->id)->count();

        // Recent snippets
        $recentListings = Listing::where('user_id', $user->id)
                                 ->latest()
                                 ->limit(3)
                                 ->get();

        $recentMessages = Message::with('sender:id,name')
                                 ->where('receiver_id', $user->id)
                                 ->latest()
                                 ->limit(3)
                                 ->get();

        // Placeholder until you build an Activity model
        $recentActivities = collect();

        return view('user.dashboard', compact(
            'myListingsCount',
            'messagesCount',
            'favoritesCount',
            'recentListings',
            'recentMessages',
            'recentActivities'
        ));
    }
}
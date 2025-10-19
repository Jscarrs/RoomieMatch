<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Temporary static data until DB setup
        $myListingsCount = 3;
        $messagesCount = 5;

        return view('user.dashboard', compact('myListingsCount', 'messagesCount'));
    }
}

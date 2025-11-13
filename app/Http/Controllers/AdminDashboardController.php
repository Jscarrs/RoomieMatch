<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing; // if you have a listings model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Stats
        $totalUsers = User::count();
        $recentUsers = User::latest()->take(5)->get();
        $totalListings = class_exists(Listing::class) ? Listing::count() : 0;

        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact('users', 'totalUsers', 'recentUsers', 'totalListings'));
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make('password123'); // Default password
        $user->save();

        return back()->with('success', "Password for {$user->name} has been reset to 'password123'.");
    }

    public function updateRole(Request $request, $id)
{
    $request->validate([
        'role' => ['required', 'in:user,admin'],
    ]);

    $user = User::findOrFail($id);

    // Set is_admin based on selected role
    $user->is_admin = $request->role === 'admin' ? 1 : 0;
    $user->save();

    return back()->with('success', "{$user->name}'s admin status has been updated.");
}




    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', "{$user->name}'s account has been deleted.");
    }
}

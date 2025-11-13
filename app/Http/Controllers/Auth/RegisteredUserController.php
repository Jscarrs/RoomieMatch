<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        Log::info('Displaying registration view.');
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        Log::info('Register method started.');
        Log::info('Raw request data:', $request->all());

        try {
            Log::info('Starting validation...');
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            Log::info('Validation passed.', $validated);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed:', $e->errors());
            return redirect()->back()->withInput()->withErrors($e->errors());
        }

        Log::info('Creating user...');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Log::info('User created.', $user->toArray());

        Log::info('Firing Registered event...');
        event(new Registered($user));
        Log::info('Registered event fired.');

        // Not logging in! Goes to login instead.
        Log::info('Redirecting to login page...');
        return redirect(route('login', absolute: false))->with('success', 'You are registered! Please log in.');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // --- Admin Account ---
        User::firstOrCreate(
            ['email' => 'admin@roomiematch.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'), // You can change this password
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // --- Test User ---
        $user = User::firstOrCreate(
            ['email' => 'test@roomiematch.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'email_verified_at' => now(),
            ]
        );

        // --- Example Listings for Test User ---
        if (Listing::count() === 0) {
            Listing::factory()->count(3)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}

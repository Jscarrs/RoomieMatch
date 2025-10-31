<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Listing;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create a test user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@roomiematch.com',
            'password' => bcrypt('password'),
        ]);

        // Create a few test listings for the user
        Listing::factory()->count(3)->create([
            'user_id' => $user->id,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@roomiematch.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('admin'), 
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}

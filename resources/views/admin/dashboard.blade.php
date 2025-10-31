@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-8">

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold text-indigo-400 mb-2">Admin Dashboard</h1>
        <p class="text-gray-400">Welcome back, {{ Auth::user()->name }}.</p>
    </div>

    {{-- Site Overview --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gray-800 p-5 rounded-lg shadow text-center">
            <h3 class="text-gray-400 text-sm uppercase">Total Users</h3>
            <p class="text-2xl font-bold text-white mt-2">{{ $totalUsers }}</p>
        </div>

        <div class="bg-gray-800 p-5 rounded-lg shadow text-center">
            <h3 class="text-gray-400 text-sm uppercase">Total Listings</h3>
            <p class="text-2xl font-bold text-white mt-2">{{ $totalListings }}</p>
        </div>

        <div class="bg-gray-800 p-5 rounded-lg shadow text-center">
            <h3 class="text-gray-400 text-sm uppercase">Recent Signups</h3>
            <ul class="text-sm mt-2 text-gray-300">
                @forelse ($recentUsers as $user)
                    <li>{{ $user->name }} – {{ $user->created_at->format('M d, Y') }}</li>
                @empty
                    <li>No new users</li>
                @endforelse
            </ul>
        </div>
    </div>

    {{-- User Management --}}
    <div class="bg-gray-800 p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-200 mb-4">User Accounts</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead>
                    <tr class="text-left text-gray-400 uppercase text-sm">
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4">Joined</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($users as $user)
                        <tr class="text-gray-300 hover:bg-gray-700 transition">
                            <td class="py-3 px-4">{{ $user->name }}</td>
                            <td class="py-3 px-4">{{ $user->email }}</td>
                            <td class="py-3 px-4">
                                <form method="POST" action="{{ route('admin.update-role', $user->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role" onchange="this.form.submit()" class="bg-gray-900 border border-gray-700 rounded text-gray-300 text-sm px-2 py-1">
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </form>
                            </td>
                            <td class="py-3 px-4">{{ $user->created_at->format('M d, Y') }}</td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <form method="POST" action="{{ route('admin.reset-password', $user->id) }}" class="inline-block">
                                    @csrf
                                    <button class="text-indigo-400 hover:text-indigo-200 text-sm font-medium">Reset Password</button>
                                </form>

                                <form method="POST" action="{{ route('admin.delete-user', $user->id) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:text-red-300 text-sm font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Activity Log --}}
    <div class="bg-gray-800 p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-200 mb-4">Activity Log</h2>
        <ul class="text-gray-300 text-sm space-y-2">
            <li>🕒 User Scarlett Jet registered - Oct 20, 2025</li>
            <li>🕒 Admin reset password for Rajkamal Singh</li>
            <li>🕒 Joe Appiah updated his profile</li>
        </ul>
        <p class="text-gray-500 text-sm mt-2">(*Static sample — you can link this to real logs later using Laravel’s events or database.)</p>
    </div>

</div>
@endsection

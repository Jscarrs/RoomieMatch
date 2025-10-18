@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">User Dashboard</h1>

    <div class="row">
        <!-- My Listings -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-house-door"></i> My Listings</h5>
                    <p class="card-text fs-3">{{ $myListingsCount ?? 0 }}</p>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-info shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-envelope"></i> Messages</h5>
                    <p class="card-text fs-3">{{ $messagesCount ?? 0 }}</p>
                </div>
            </div>
        </div>

        <!-- Profile -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-person"></i> Profile</h5>
                    <p class="card-text">Welcome back, {{ Auth::user()->name ?? 'User' }}!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Recent Activity</h4>
        <p class="text-muted">No recent activity yet. Start by creating a new listing or checking your messages.</p>
    </div>
</div>
@endsection

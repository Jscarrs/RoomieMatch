@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1 class="mb-4">Admin Dashboard</h1>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-people-fill"></i> Total Users</h5>
                <p class="card-text display-6">120</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-house-fill"></i> Total Listings</h5>
                <p class="card-text display-6">45</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-hourglass-split"></i> Pending Applications</h5>
                <p class="card-text display-6">8</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-envelope-fill"></i> Messages</h5>
                <p class="card-text display-6">15</p>
            </div>
        </div>
    </div>
</div>

<h2>Recent Users</h2>
<table class="table table-striped shadow-sm">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Joined</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Sarah Smith</td>
            <td>sarah@example.com</td>
            <td>2025-10-01</td>
        </tr>
        <tr>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>2025-10-02</td>
        </tr>
    </tbody>
</table>
@endsection

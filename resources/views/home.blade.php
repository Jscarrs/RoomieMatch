@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="text-center bg-light p-5 rounded shadow-sm mb-5">
    <h1 class="display-4">Find Your Perfect Roommate</h1>
    <p class="lead">RoomieMatch helps students find compatible roommates and affordable housing near campus.</p>
    <img src="{{ asset('images/home1.jpg') }}" alt="RoomieMatch Hero" class="img-fluid rounded my-3">
    <a href="{{ route('about') }}" class="btn btn-primary btn-lg mt-3">Learn More</a>
</section>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card p-3 shadow-sm">
            <img src="{{ asset('images/home2.jpg') }}" class="img-fluid rounded mb-3" alt="Roommate Matching">
            <h5>Find Compatible Roommates</h5>
            <p>Set preferences, filter by lifestyle, and find a roommate that matches your needs.</p>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card p-3 shadow-sm">
            <h5>Post and Browse Housing</h5>
            <p>Check available rooms and apartments near campus and make your living arrangements easier.</p>
        </div>
    </div>
</div>
@endsection

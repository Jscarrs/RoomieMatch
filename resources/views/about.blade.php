@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="text-center mb-5">
    <h1>About RoomieMatch</h1>
    <p class="lead">We help students find the perfect roommate and affordable housing options quickly and safely.</p>
</div>

<div class="row align-items-center">
    <div class="col-md-6 mb-3">
        <img src="{{ asset('images/about.jpg') }}" alt="About RoomieMatch" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-6">
        <p>RoomieMatch allows students to create profiles, set their preferences, and connect with compatible roommates. Say goodbye to random Facebook posts or Craigslist ads!</p>
        <p>Students can filter roommates based on lifestyle preferences, budget, and study habits, ensuring a harmonious living environment.</p>
    </div>
</div>
@endsection

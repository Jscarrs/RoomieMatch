@extends('layouts.app')

@section('content')
<section class="bg-gray-900 text-gray-100 min-h-screen py-10">
    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-3xl font-bold mb-6 text-white">Create a New Listing</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-600/20 text-emerald-400 rounded-lg border border-emerald-600/30">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-600/20 text-red-400 rounded-lg border border-red-600/30">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Listing Form -->
        <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-8 rounded-2xl shadow-lg border border-gray-700">
            @csrf
            @include('listings.partials.form', ['listing' => null])

            <div class="mt-6 flex justify-end gap-4">
                <a href="{{ route('listings.index') }}"
                   class="px-4 py-2 bg-gray-700 text-gray-200 rounded-lg hover:bg-gray-600 transition">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                    Create Listing
                </button>
            </div>
        </form>
    </div>
</section>
@endsection

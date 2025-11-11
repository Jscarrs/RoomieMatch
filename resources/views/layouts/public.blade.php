<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!--Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Public Navigation -->
        <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                           <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-indigo-400 dark:border-indigo-600' : 'border-transparent' }} text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 hover:text-gray-700 dark:hover:text-gray-300 transition duration-150 ease-in-out">
                                Home
                            </a>
                        </div>
                            </a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('contact') ? 'border-indigo-400 dark:border-indigo-600' : 'border-transparent' }} text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                Contact
                            </a>
                        </div>
                    </div>

                    <!-- Right side - Login/Register -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        @auth
                            <a href="{{ route('user.dashboard') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 mr-4">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 mr-4">
                                Log in
                            </a>
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Register
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-12">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                    © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
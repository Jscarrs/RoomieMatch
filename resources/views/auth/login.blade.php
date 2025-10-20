<x-guest-layout>
    <div class="w-full max-w-md bg-gray-800 text-white rounded-2xl shadow-xl p-8 mx-auto">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-indigo-400">Welcome Back</h1>
            <p class="text-gray-400 mt-1 text-sm">Sign in to continue to RoomieMatch</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                <x-text-input id="email" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white rounded-lg focus:ring-indigo-500 focus:border-indigo-500" 
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
                <x-text-input id="password" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                    type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>

            <!-- Remember Me + Forgot -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-600 bg-gray-800 text-indigo-500 shadow-sm focus:ring-indigo-500"
                           name="remember">
                    <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-400 hover:text-indigo-300 transition-colors duration-200"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <x-primary-button class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-700 rounded-lg">
                    {{ __('Log In') }}
                </x-primary-button>
            </div>
        </form>

        <div class="text-center mt-6 text-sm text-gray-400">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">Register</a>
        </div>
    </div>
</x-guest-layout>

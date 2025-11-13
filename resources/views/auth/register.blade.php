<x-guest-layout>
    <div class="w-full max-w-md bg-gray-800 text-white rounded-2xl shadow-xl p-8 mx-auto">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-indigo-400">Create an Account</h1>
            <p class="text-gray-400 mt-1 text-sm">Sign up for RoomieMatch</p>
        </div>

        <!-- Registration Errors -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-2 rounded">
                <strong>Registration failed:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-gray-300" />
                <x-text-input id="name" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                <x-text-input id="email" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                    type="email" name="email" :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
                <x-text-input id="password" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>

            <!-- Password Confirmation -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-300" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
            </div>

            <!-- Register Button -->
            <div class="pt-4">
                <x-primary-button class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-700 rounded-lg">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

        <div class="text-center mt-6 text-sm text-gray-400">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">Log in</a>
        </div>
    </div>
</x-guest-layout>

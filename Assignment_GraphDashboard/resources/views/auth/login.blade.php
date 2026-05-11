<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900">Welcome back</h2>
        <p class="text-sm text-gray-500 mt-2">Please sign in to your dashboard account</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 font-semibold transition duration-150 ease-in-out" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 px-6 py-3 bg-gray-900 hover:bg-black text-white transition duration-150 ease-in-out">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Don't have an account? 
                <a href="{{ route('register') }}" class="font-semibold text-gray-900 hover:text-black transition duration-150 ease-in-out">Sign up here</a>
            </p>
        </div>
    </form>
</x-guest-layout>

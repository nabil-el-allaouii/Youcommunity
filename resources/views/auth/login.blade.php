<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Welcome to Your Community</h1>
        <p class="text-gray-600">Join local events and connect with people near you</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="relative">
            <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700 mb-1" />
            <x-text-input id="email"
                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-indigo-600 focus:ring focus:ring-indigo-100 transition-all duration-200"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="relative">
            <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700 mb-1" />
            <x-text-input id="password"
                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-indigo-600 focus:ring focus:ring-indigo-100 transition-all duration-200"
                type="password"
                name="password"
                required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Remember Me and Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 cursor-pointer"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
            <a class="text-sm text-indigo-600 hover:text-indigo-800 font-medium" href="{{ route('password.request') }}">
                {{ __('Forgot password?') }}
            </a>
            @endif
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors duration-200">
                {{ __('Sign in') }}
            </x-primary-button>
        </div>

        <div class="text-center text-sm text-gray-600">
            {{ __("Don't have an account?") }}
            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-800">
                {{ __('Sign up') }}
            </a>
        </div>
    </form>
</x-guest-layout>
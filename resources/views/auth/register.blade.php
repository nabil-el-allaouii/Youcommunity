<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Create Your Account</h1>
        <p class="text-gray-600">Join thousands of people discovering local events</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="max-w-sm mx-auto space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" class="text-sm font-medium text-gray-700 mb-1" />
            <x-text-input id="name"
                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-indigo-600 focus:ring focus:ring-indigo-100 transition-all duration-200"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700 mb-1" />
            <x-text-input id="email"
                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-indigo-600 focus:ring focus:ring-indigo-100 transition-all duration-200"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700 mb-1" />
            <x-text-input id="password"
                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-indigo-600 focus:ring focus:ring-indigo-100 transition-all duration-200"
                type="password"
                name="password"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-medium text-gray-700 mb-1" />
            <x-text-input id="password_confirmation"
                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-indigo-600 focus:ring focus:ring-indigo-100 transition-all duration-200"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors duration-200">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>

        <div class="text-center text-sm text-gray-600">
            {{ __('Already have an account?') }}
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-800">
                {{ __('Sign in') }}
            </a>
        </div>
    </form>
</x-guest-layout>
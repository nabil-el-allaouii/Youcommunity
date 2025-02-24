<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000" data-border-radius="small"></script>
</head>

<body class="font-['Inter'] bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <div class="flex-1 bg-gray-50">
            <!-- Navigation -->
            <header class="bg-white shadow">
                <div class="bg-white shadow-sm border-b py-3 px-4">
                    <nav class="max-w-7xl mx-auto flex items-center justify-between gap-4">
                        <a href="/"><img src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png" alt="Logo" class="h-8" /></a>
                        <div class="flex items-center space-x-6">
                            <a href="{{ route('dashboard') }}" class="flex items-center text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-gray-900' : 'text-gray-600' }} hover:text-custom">
                                <i class="fas fa-home w-5 h-5 mr-2"></i>
                                <span class="hidden sm:inline">Dashboard</span>
                            </a>
                            <a href="/profile" class="flex items-center text-sm font-medium text-gray-600 hover:text-custom">
                                <i class="fas fa-user w-5 h-5 mr-2"></i>
                                <span class="hidden sm:inline">Profile</span>
                            </a>
                            <a href="{{Route('my.events')}}" class="flex items-center text-sm font-medium text-gray-600 hover:text-custom">
                                <i class="fas fa-calendar w-5 h-5 mr-2"></i>
                                <span class="hidden sm:inline">Events</span>
                            </a>
                            <a href="#" class="flex items-center text-sm font-medium text-gray-600 hover:text-custom">
                                <i class="fas fa-history w-5 h-5 mr-2"></i>
                                <span class="hidden sm:inline">History</span>
                            </a>
                            <a href="#" class="flex items-center text-sm font-medium text-gray-600 hover:text-custom">
                                <i class="fas fa-cog w-5 h-5 mr-2"></i>
                                <span class="hidden sm:inline">Settings</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                                @csrf
                                <button type="submit" class="flex items-center text-sm font-medium text-gray-600 hover:text-custom">
                                    <i class="fas fa-sign-out-alt w-5 h-5 mr-2"></i>
                                    <span class="hidden sm:inline">Logout</span>
                                </button>
                            </form>
                            <div class="flex items-center ml-4 pl-4 border-l">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full" />
                                <div class="ml-3 hidden sm:block">
                                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500">Member</p>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                @isset($header)
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    {{ $header }}
                </div>
                @endisset
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
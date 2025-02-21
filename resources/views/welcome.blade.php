<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub - Discover, Create, and Manage Local Events</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#4F46E5" data-border-radius='small'></script>
</head>

<body class="font-['Inter'] bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <img class="h-8 w-auto" src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png" alt="EventHub">
                </div>
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Sign In</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="!rounded-button bg-custom text-white px-4 py-2 hover:bg-custom/90">Sign Up</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section class="relative bg-white overflow-hidden">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                    <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                        <h1 class="text-4xl tracking-tight font-bold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block">Discover, Create, and</span>
                            <span class="block text-custom">Manage Local Events</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                            Join our vibrant community platform where you can discover exciting local events, create your own gatherings, and connect with like-minded people.
                        </p>
                        <div class="mt-8 sm:max-w-lg sm:mx-auto lg:mx-0">
                            <a href="{{ route('register') }}" class="!rounded-button w-full sm:w-auto px-8 py-3 bg-custom text-white text-lg font-medium hover:bg-custom/90">
                                Get Started
                            </a>
                        </div>
                    </div>
                    <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                        <img src="https://creatie.ai/ai/api/search-image?query=A 3D vector-style image with a clean, solid background color showing diverse group of people connecting and interacting at various events, with modern geometric elements and vibrant colors&width=600&height=500&orientation=portrait&removebg=true&flag=eb1a4166-5571-4212-b0ab-154051bff569" alt="Community Events" class="w-full">
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Events Section -->
        <section class="bg-white py-24">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Featured Events</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Event Cards -->
                    @foreach(['Tech Innovation Summit', 'Creative Art Workshop', 'Wellness & Fitness Expo'] as $index => $event)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                        <img src="{{ asset('images/event-' . ($index + 1) . '.jpg') }}" class="h-48 w-full object-cover" alt="{{ $event }}">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $event }}</h3>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <i class="far fa-calendar mr-2"></i>
                                <span>March {{ 15 + ($index * 5) }}, 2024</span>
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <span>{{ ['Convention Center', 'Art Studio Central', 'City Sports Complex'][$index] }}</span>
                            </div>
                            <p class="mt-3 text-base text-gray-500 line-clamp-2">
                                {{ ['Join industry leaders and innovators for a day of inspiring talks and networking opportunities.',
                                           'Express your creativity in this hands-on workshop led by professional artists.',
                                           'Discover the latest in fitness and wellness with expert-led sessions and demos.'][$index] }}
                            </p>
                            <button class="!rounded-button mt-4 w-full bg-custom text-white py-2 hover:bg-custom/90">RSVP Now</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- How It Works Section -->

        <!-- Stats Section -->
        
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Company</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">About</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Contact</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Careers</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Legal</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Terms of Service</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Privacy Policy</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Cookie Policy</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Connect</h3>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Newsletter</h3>
                    <p class="text-base text-gray-500 mb-4">Stay updated with our latest events and news.</p>
                    <form class="flex">
                        <input type="email" class="form-input flex-1 !rounded-button border-gray-300" placeholder="Enter your email">
                        <button type="submit" class="!rounded-button ml-2 bg-custom text-white px-4 hover:bg-custom/90">Subscribe</button>
                    </form>
                </div>
            </div>

            <div class="mt-8 border-t border-gray-200 pt-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} YouCommunity. All rights reserved.
            </div>
        </div>
    </footer>
</body>

</html>
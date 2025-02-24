@auth
    <x-app-layout>
        <main class="max-w-4xl mx-auto px-4 py-12">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="relative h-64">
                    <img src="https://creatie.ai/ai/api/search-image?query=A modern conference room with sleek furniture, natural lighting through large windows, and a professional atmosphere"
                        alt="Event venue" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <h1 class="text-3xl font-bold">{{ $event->title }}</h1>
                        <p class="mt-2 text-lg">J{{ $event->categorie }}</p>
                    </div>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-calendar text-custom text-xl"></i>
                            <div>
                                <p class="text-sm text-gray-500">Date</p>
                                <p class="font-medium">{{ $event->date_heure->format('Y/m/d') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-clock text-custom text-xl"></i>
                            <div>
                                <p class="text-sm text-gray-500">Time</p>
                                <p class="font-medium">{{ $event->date_heure->format('H:i') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-custom text-xl"></i>
                            <div>
                                <p class="text-sm text-gray-500">Location</p>
                                <p class="font-medium">{{ $event->lieu }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-6">
                        <h2 class="text-xl font-semibold mb-4">Event Details</h2>
                        <p class="text-gray-600">{{ $event->description }}</p>
                    </div>
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-semibold">Availability</h2>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-users mr-2"></i>
                                {{$Participants}} / {{$event->max_participants}}
                            </span>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-6" id="comments-section">
                        <h2 class="text-xl font-semibold mb-4">Comments</h2>
                        <div class="space-y-4 mb-6">
                            @foreach ($event->comments as $comment)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="flex items-start justify-between">
                                        <div class="flex items-start">
                                            <img src="https://ai-public.creatie.ai/gen_page/avatar_placeholder.png"
                                                alt="User Avatar" class="w-10 h-10 rounded-full mr-3" />
                                            <div>
                                                <div class="flex items-center">
                                                    <h4 class="font-medium">{{ $comment->user->name }}</h4>
                                                    <span
                                                        class="text-gray-500 text-sm ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="text-gray-600 mt-1">{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                        @if (Auth::id() === $comment->user_id)
                                            <form action="{{ Route('Delete.comment', $event->id) }}" method="POST"
                                                class="ml-4">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $comment->id }}">
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-800 transition-colors"
                                                    onclick="return confirm('Are you sure you want to delete this comment?')">
                                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M3 6h18"></path>
                                                        <path
                                                            d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <form action="{{ Route('add.comment', $event->id) }}" method="POST">
                            @csrf
                            <div>
                                <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Add a
                                    comment</label>
                                <textarea name="content" id="comment" rows="4"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-custom focus:ring-custom"
                                    placeholder="Share your thoughts..."></textarea>
                            </div>
                            <button type="submit"
                                class="!rounded-button mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-custom hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Post Comment
                            </button>
                        </form>
                    </div>
                    @if ($event->user_id !== Auth::id() && !$isReserved && $Participants !== $event->max_participants)
                        <form action="{{Route('event.reserve' , $event->id)}}" class="border-t border-gray-200 pt-6 space-y-4" method="POST">
                            @csrf
                            <div class="flex items-center justify-center pt-4">

                                <button type="submit"
                                    class="!rounded-button inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium text-white bg-custom hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                    <i class="fas fa-ticket-alt mr-2"></i>
                                    Reserve Spot
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
            <div id="confirmation" class="hidden mt-8 bg-green-50 border border-green-200 rounded-lg p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-400 text-2xl"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-green-800">Reservation Confirmed!</h3>
                        <div class="mt-2 text-sm text-green-700">
                            <p>Your reservation has been successfully confirmed. Reservation ID: #REF123456</p>
                            <div class="mt-4 flex space-x-4">
                                <button
                                    class="!rounded-button inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-green-600 hover:bg-green-700">
                                    <i class="far fa-calendar-plus mr-2"></i>
                                    Add to Calendar
                                </button>
                                <button
                                    class="!rounded-button inline-flex items-center px-4 py-2 border border-green-600 text-sm font-medium text-green-600 bg-transparent hover:bg-green-50">
                                    <i class="far fa-envelope mr-2"></i>
                                    Email Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </x-app-layout>
@else
    <x-custom-layout>
        <main class="max-w-4xl mx-auto px-4 py-12">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="relative h-64">
                    <img src="https://creatie.ai/ai/api/search-image?query=A modern conference room with sleek furniture, natural lighting through large windows, and a professional atmosphere"
                        alt="Event venue" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <h1 class="text-3xl font-bold">{{ $event->title }}</h1>
                        <p class="mt-2 text-lg">J{{ $event->categorie }}</p>
                    </div>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-calendar text-custom text-xl"></i>
                            <div>
                                <p class="text-sm text-gray-500">Date</p>
                                <p class="font-medium">{{ $event->date_heure->format('Y:m:d') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-clock text-custom text-xl"></i>
                            <div>
                                <p class="text-sm text-gray-500">Time</p>
                                <p class="font-medium">{{ $event->date_heure->format('H:i') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-custom text-xl"></i>
                            <div>
                                <p class="text-sm text-gray-500">Location</p>
                                <p class="font-medium">{{ $event->lieu }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-6">
                        <h2 class="text-xl font-semibold mb-4">Event Details</h2>
                        <p class="text-gray-600">{{ $event->description }}</p>
                    </div>
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-semibold">Availability</h2>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-users mr-2"></i>
                                {{$Participants}} / {{$event->max_participants}}
                            </span>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-6" id="comments-section">
                        <h2 class="text-xl font-semibold mb-4">Comments</h2>
                        <div class="space-y-4 mb-6">
                            @foreach ($event->comments as $comment)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="flex items-start justify-between">
                                        <div class="flex items-start">
                                            <img src="https://ai-public.creatie.ai/gen_page/avatar_placeholder.png"
                                                alt="User Avatar" class="w-10 h-10 rounded-full mr-3" />
                                            <div>
                                                <div class="flex items-center">
                                                    <h4 class="font-medium">{{ $comment->name }}</h4>
                                                    <span
                                                        class="text-gray-500 text-sm ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="text-gray-600 mt-1">{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <form action="#" method="POST">
                            @csrf
                            <div>
                                <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Add a
                                    comment</label>
                                <textarea name="content" id="comment" rows="4"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-custom focus:ring-custom"
                                    placeholder="Share your thoughts..."></textarea>
                            </div>
                            <button type="submit"
                                class="!rounded-button mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-custom hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Post Comment
                            </button>
                        </form>
                    </div>
                    <form class="border-t border-gray-200 pt-6 space-y-4" method="POST">
                        @csrf
                        <div class="flex items-center justify-center pt-4">
                            <button type="submit"
                                class="!rounded-button inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium text-white bg-custom hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                <i class="fas fa-ticket-alt mr-2"></i>
                                Reserve Spot
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="confirmation" class="hidden mt-8 bg-green-50 border border-green-200 rounded-lg p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-400 text-2xl"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-green-800">Reservation Confirmed!</h3>
                        <div class="mt-2 text-sm text-green-700">
                            <p>Your reservation has been successfully confirmed. Reservation ID: #REF123456</p>
                            <div class="mt-4 flex space-x-4">
                                <button
                                    class="!rounded-button inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-green-600 hover:bg-green-700">
                                    <i class="far fa-calendar-plus mr-2"></i>
                                    Add to Calendar
                                </button>
                                <button
                                    class="!rounded-button inline-flex items-center px-4 py-2 border border-green-600 text-sm font-medium text-green-600 bg-transparent hover:bg-green-50">
                                    <i class="far fa-envelope mr-2"></i>
                                    Email Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </x-custom-layout>
@endauth

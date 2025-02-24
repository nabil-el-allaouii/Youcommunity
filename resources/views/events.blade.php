<x-app-layout>
    <div id="notification" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline" id="notification-message"></span>
        </div>
    </div>

    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">My Events</h1>
            <nav class="flex mt-2" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="#" class="text-gray-500 hover:text-gray-700">Home</a></li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 text-sm mx-2"></i>
                        <span class="text-gray-900">My Events</span>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="bg-white rounded-lg shadow mb-8">
            <div class="p-4 border-b border-gray-200">
                <div class="flex flex-wrap items-center gap-4">
                    <div class="relative">
                        <select
                            class="block w-48 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-custom focus:border-custom rounded-button">
                            <option>All Events</option>
                            <option>Upcoming Events</option>
                            <option>Past Events</option>
                        </select>
                    </div>
                    <div class="relative">
                        <input type="date"
                            class="block w-48 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-custom focus:border-custom rounded-button">
                    </div>
                    <button
                        class="ml-auto inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-button shadow-sm text-white bg-custom hover:bg-custom/90 focus:outline-none">
                        <i class="fas fa-plus mr-2"></i>
                        Browse Events
                    </button>
                </div>
            </div>

            <div class="divide-y divide-gray-200">
                @foreach ($myevents as $myevent)
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <img class="h-20 w-20 rounded-lg object-cover"
                                    src="https://creatie.ai/ai/api/search-image?query=A modern conference room setup with professional lighting, comfortable seating, and presentation equipment. The room should have a clean, corporate aesthetic with natural light coming through large windows&width=400&height=400&orientation=squarish&flag=237ee59d-1099-4858-acd1-d41ccad696b0"
                                    alt="Event">
                            </div>
                            <div class="ml-6 flex-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-medium text-gray-900">{{ $myevent->title }}</h3>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Upcoming
                                    </span>
                                </div>
                                <div class="mt-2 text-sm text-gray-500">
                                    <p class="line-clamp-2">{{ $myevent->description }}</p>
                                </div>
                                <div class="mt-4 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-calendar mr-2"></i>
                                    <span>{{ $myevent->date_heure }}</span>
                                    <i class="fas fa-map-marker-alt ml-6 mr-2"></i>
                                    <span>{{ $myevent->lieu }}</span>
                                </div>
                                <div class="mt-4">
                                    <form action="{{Route('cancel.join')}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$myevent->id}}">
                                        <button
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-button text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none">
                                            <i class="fas fa-times mr-2"></i>
                                            Cancel Participation
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="mt-1 text-sm text-gray-500">Here's what's happening with your events</p>
            </div>
            <button onclick="openEventModal()"
                class="!rounded-button inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-custom hover:bg-custom/90">
                <i class="fas fa-plus mr-2"></i>
                Create Event
            </button>
        </div>
    </x-slot>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h2 class="text-lg font-medium text-gray-900">Your Events</h2>
                        @foreach ($events as $event)
                            <div class="mt-6 grid gap-6">
                                <div class="flex flex-col sm:flex-row bg-white border rounded-lg overflow-hidden">
                                    <img src="https://creatie.ai/ai/api/search-image?query=A vibrant tech conference scene with modern stage setup"
                                        alt="Event" class="h-48 w-full sm:w-48 object-cover" />
                                    <div class="p-6 flex-1">
                                        <div class="flex items-center justify-between">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $event->categorie }}
                                            </span>
                                            <div class="flex items-center space-x-2">
                                                <form action="{{ route('event.edit', $event->id) }}" method="GET">
                                                    <button type="submit"
                                                        class="!rounded-button inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                        <i class="fas fa-edit mr-2"></i>
                                                        Edit
                                                    </button>
                                                </form>
                                                <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="!rounded-button inline-flex items-center px-3 py-2 border border-red-300 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50">
                                                        <i class="fas fa-trash-alt mr-2"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <h3 class="mt-2 text-lg font-medium text-gray-900">{{ $event->title }}</h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-2"></i>
                                            {{ $event->lieu }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            <i class="fas fa-clock mr-2"></i>
                                            {{ $event->date_heure }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            <i class="fas fa-users mr-2"></i>
                                            Max Participants: {{ $event->max_participants }}
                                        </p>
                                        <a href="{{ Route('event.details', $event->id) }}">
                                            <button type="submit"
                                                class="!rounded-button mt-4 inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                View Details
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <!-- Quick Stats -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h2 class="text-lg font-medium text-gray-900">Quick Stats</h2>
                        <dl class="mt-6 grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <dt class="text-sm font-medium text-gray-500">Total Events</dt>
                                <dd class="mt-1 text-3xl font-semibold text-custom">12</dd>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <dt class="text-sm font-medium text-gray-500">Upcoming RSVPs</dt>
                                <dd class="mt-1 text-3xl font-semibold text-custom">5</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Recent Notifications -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h2 class="text-lg font-medium text-gray-900">Recent Notifications</h2>
                        <div class="mt-6 space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <span
                                        class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100">
                                        <i class="fas fa-bell text-blue-600"></i>
                                    </span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Event Update</p>
                                    <p class="mt-1 text-sm text-gray-500">Tech Innovation Summit venue has been updated
                                    </p>
                                    <p class="mt-1 text-xs text-gray-400">2 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h2 class="text-lg font-medium text-gray-900">Quick Actions</h2>
                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <button
                                class="!rounded-button flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <i class="fas fa-user-edit text-xl text-custom mb-2"></i>
                                <span class="text-sm font-medium text-gray-900">Edit Profile</span>
                            </button>
                            <button
                                class="!rounded-button flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <i class="fas fa-calendar-check text-xl text-custom mb-2"></i>
                                <span class="text-sm font-medium text-gray-900">Manage RSVPs</span>
                            </button>
                            <button
                                class="!rounded-button flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <i class="fas fa-bell text-xl text-custom mb-2"></i>
                                <span class="text-sm font-medium text-gray-900">Notifications</span>
                            </button>
                            <button
                                class="!rounded-button flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <i class="fas fa-cog text-xl text-custom mb-2"></i>
                                <span class="text-sm font-medium text-gray-900">Settings</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Event Creation Modal -->
    <div id="eventModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden transition-opacity">
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <div class="absolute right-0 top-0 pr-4 pt-4">
                        <button onclick="closeEventModal()"
                            class="rounded-md bg-white text-gray-400 hover:text-gray-500">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form action=" {{ Route('event.add') }} " method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Create New Event</h3>
                            <p class="mt-1 text-sm text-gray-500">Fill in the details for your new event.</p>
                        </div>

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Event Title</label>
                            <input type="text" name="title" id="title" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom focus:ring-custom sm:text-sm">
                        </div>

                        <div>
                            <label for="date_heure" class="block text-sm font-medium text-gray-700">Date &
                                Time</label>
                            <input type="datetime-local" name="date_heure" id="date_heure" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom focus:ring-custom sm:text-sm">
                        </div>

                        <div>
                            <label for="lieu" class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" name="lieu" id="lieu" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom focus:ring-custom sm:text-sm">
                        </div>

                        <div>
                            <label for="description"
                                class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="3" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom focus:ring-custom sm:text-sm"></textarea>
                        </div>

                        <div>
                            <label for="categorie" class="block text-sm font-medium text-gray-700">Category</label>
                            <input type="text" name="categorie" id="categorie" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom focus:ring-custom sm:text-sm">
                        </div>

                        <div>
                            <label for="max_participants" class="block text-sm font-medium text-gray-700">Maximum
                                Participants</label>
                            <input type="number" name="max_participants" id="max_participants" required
                                min="1"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom focus:ring-custom sm:text-sm">
                        </div>

                        <div class="mt-5 sm:mt-6 flex justify-end gap-3">
                            <button type="button" onclick="closeEventModal()"
                                class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-custom focus:ring-offset-2">
                                Cancel
                            </button>
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-custom px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-custom focus:ring-offset-2">
                                Create Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openEventModal() {
            document.getElementById('eventModal').classList.remove('hidden');
        }

        function closeEventModal() {
            document.getElementById('eventModal').classList.add('hidden');
        }
    </script>
</x-app-layout>

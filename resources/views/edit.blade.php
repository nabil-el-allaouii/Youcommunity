<x-app-layout>
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-3xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Edit Event</h1>
                <p class="mt-2 text-sm text-gray-600">Update your event details below</p>
            </div>

            <div id="status-message" class="hidden mb-6 p-4 rounded-md"></div>

            <form action="{{ Route('edit.event',$events->id) }}" class="space-y-6 bg-white shadow-sm rounded-lg p-6" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Event Title</label>
                        <div class="mt-1 relative">
                            <input value="{{$events->title}}" type="text" name="title" id="title" maxlength="255" class="block w-full !rounded-button border-gray-300 shadow-sm focus:ring-custom focus:border-custom sm:text-sm">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-sm text-gray-400" id="title-counter">0/255</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="categorie" class="block text-sm font-medium text-gray-700">Category</label>
                        <input type="text" name="categorie" value="{{$events->categorie}}"  maxlength="255" class="block w-full !rounded-button border-gray-300 shadow-sm focus:ring-custom focus:border-custom sm:text-sm">
                    </div>

                    <div>
                        <label for="lieu" class="block text-sm font-medium text-gray-700">Location</label>
                        <div class="mt-1 relative">
                            <input value="{{$events->lieu}}" type="text" name="lieu" id="lieu" class="block w-full !rounded-button pl-10 border-gray-300 shadow-sm focus:ring-custom focus:border-custom sm:text-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-location-dot text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="date_heure" class="block text-sm font-medium text-gray-700">Date and Time</label>
                        <div class="mt-1 relative">
                            <input value="{{$events->date_heure}}" type="datetime-local" name="date_heure" id="date_heure" class="block w-full !rounded-button pl-10 border-gray-300 shadow-sm focus:ring-custom focus:border-custom sm:text-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-calendar text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="max_participants" class="block text-sm font-medium text-gray-700">Maximum Participants</label>
                        <div class="mt-1 relative">
                            <input value="{{$events->max_participants}}" type="number" name="max_participants" id="max_participants" min="1" class="block w-full !rounded-button pl-10 border-gray-300 shadow-sm focus:ring-custom focus:border-custom sm:text-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-users text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="4" class="block w-full !rounded-button border-gray-300 shadow-sm focus:ring-custom focus:border-custom sm:text-sm">{{$events->description}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <button type="button" class="!rounded-button bg-white py-2 px-4 border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                        Cancel
                    </button>
                    <button type="submit" class="!rounded-button bg-custom py-2 px-4 border border-transparent text-sm font-medium text-white hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('title').addEventListener('input', function(e) {
            document.getElementById('title-counter').textContent = `${e.target.value.length}/255`;
        });
    </script>
</x-app-layout>
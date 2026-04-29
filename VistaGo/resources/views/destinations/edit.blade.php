<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Destination: {{ $destination->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('destinations.update', $destination) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Destination Name</label>
                            <input type="text" name="name" value="{{ $destination->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ $destination->description }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Entry Fee (₱)</label>
                                <input type="number" step="0.01" name="fee" value="{{ $destination->fee }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Difficulty Level</label>
                                <input type="text" name="difficulty_level" value="{{ $destination->difficulty_level }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6 border-t border-gray-100 pt-4">
                            <a href="{{ route('destinations.index') }}" class="text-gray-500 hover:text-gray-700 font-medium transition">Cancel</a>
                            <button type="submit" class="bg-gray-900 text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition shadow-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
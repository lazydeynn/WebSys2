<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Destinations
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-end">
                <a href="{{ route('destinations.create') }}" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition">
                    Add New Destination
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-gray-200 bg-gray-50">
                                <th class="p-3 font-semibold text-gray-600">Name</th>
                                <th class="p-3 font-semibold text-gray-600">Fee (₱)</th>
                                <th class="p-3 font-semibold text-gray-600">Difficulty</th>
                                <th class="p-3 font-semibold text-gray-600 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($destinations as $destination)
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                <td class="p-3">{{ $destination->name }}</td>
                                <td class="p-3">₱{{ $destination->fee }}</td>
                                <td class="p-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{ $destination->difficulty_level }}</span>
                                </td>
                                <td class="p-3 text-right">
                                    <a href="{{ route('destinations.edit', $destination) }}" class="text-indigo-600 hover:underline mr-3">Edit</a>
                                    <form action="{{ route('destinations.destroy', $destination) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
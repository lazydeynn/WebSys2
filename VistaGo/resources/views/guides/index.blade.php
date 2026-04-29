<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Tour Guides
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-end">
                <a href="{{ route('guides.create') }}" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition">
                    Register New Guide
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-gray-200 bg-gray-50">
                                <th class="p-3 font-semibold text-gray-600">Full Name</th>
                                <th class="p-3 font-semibold text-gray-600">Specialization</th>
                                <th class="p-3 font-semibold text-gray-600">Daily Rate (₱)</th>
                                <th class="p-3 font-semibold text-gray-600 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($guides as $guide)
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                <td class="p-3 font-medium text-gray-900">{{ $guide->name }}</td>
                                <td class="p-3">
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{ $guide->specialization }}</span>
                                </td>
                                <td class="p-3">₱{{ $guide->daily_rate }}</td>
                                <td class="p-3 text-right">
                                    <a href="{{ route('guides.edit', $guide) }}" class="text-indigo-600 hover:underline mr-3">Edit</a>
                                    <form action="{{ route('guides.destroy', $guide) }}" method="POST" class="inline">
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
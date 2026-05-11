<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Guide: {{ $guide->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('guides.update', $guide) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" value="{{ $guide->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Specialization</label>
                                <input type="text" name="specialization" value="{{ $guide->specialization }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Daily Rate (₱)</label>
                                <input type="number" step="0.01" name="daily_rate" value="{{ $guide->daily_rate }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Guide Profile Picture</label>
                            <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6 border-t border-gray-100 pt-4">
                            <a href="{{ route('guides.index') }}" class="text-gray-500 hover:text-gray-700 font-medium transition">Cancel</a>
                            <button type="submit" class="bg-gray-900 text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition shadow-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
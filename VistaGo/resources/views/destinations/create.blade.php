<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Destination</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Destination Name</label>
                            <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Entry Fee (₱)</label>
                                <input type="number" step="0.01" name="fee" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Difficulty Level</label>
                                <select name="difficulty_level" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="Beginner">Beginner</option>
                                    <option value="Moderate">Moderate</option>
                                    <option value="Advanced">Advanced</option>
                                </select>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Category</label>
                                <select name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="Nature">Nature</option>
                                    <option value="Historical">Historical</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="Cultural">Cultural</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Destination Image</label>
                            <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
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
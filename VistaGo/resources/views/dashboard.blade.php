<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tourist Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Welcome to VistaGo, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-500 mb-6">Your account is active. Head over to our catalog to find your next travel destination.</p>
                    
                    <a href="{{ url('/') }}" class="inline-block bg-gray-900 text-white font-medium px-6 py-2 rounded-lg hover:bg-gray-800 transition shadow-sm">
                        View Tourist Spots
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
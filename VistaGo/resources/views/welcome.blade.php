<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VistaGo - Discover Destinations</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    
    <nav class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="text-2xl font-black text-indigo-600 tracking-tighter">VistaGo.</div>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-indigo-600 font-medium transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600 font-medium mr-4 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-5 py-2 rounded-md hover:bg-indigo-700 font-medium transition shadow-sm">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <header class="bg-indigo-50 py-16 text-center border-b border-indigo-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Explore Our Tourist Spots</h1>
            <p class="mt-4 max-w-2xl text-lg text-gray-500 mx-auto">Discover beauty, adventure, and heritage. Browse our curated list of destinations below.</p>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($destinations->isEmpty())
            <div class="text-center text-gray-500 py-12 bg-white rounded-lg shadow-sm border border-gray-100">
                No destinations available yet. Please check back later.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($destinations as $destination)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-bold text-gray-900">{{ $destination->name }}</h3>
                                <span class="bg-indigo-100 text-indigo-800 text-xs px-3 py-1 rounded-full font-bold uppercase tracking-wider">{{ $destination->difficulty_level }}</span>
                            </div>
                            
                            <p class="text-gray-600 mb-6 text-sm line-clamp-3">{{ $destination->description }}</p>
                            
                            <div class="border-t border-gray-100 pt-4 flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500">Entry Fee</span>
                                <span class="text-lg font-black text-gray-900">₱{{ number_format($destination->fee, 2) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

</body>
</html>
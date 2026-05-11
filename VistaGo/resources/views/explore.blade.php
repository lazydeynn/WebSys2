<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VistaGo | Explore Catalog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased font-sans flex flex-col min-h-screen">

    <!-- Navbar -->
    @include('layouts.navigation')

    <!-- Header -->
    <header class="bg-white border-b border-slate-100 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-extrabold text-slate-900 tracking-tight mb-4">Discover Destinations</h1>
            <p class="text-xl text-slate-500 max-w-2xl mx-auto font-light">Find and book the best tourist spots. Filter by category, difficulty, or search by name to find your perfect getaway.</p>
        </div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full">
        <!-- Search and Filter Bar -->
        <div class="bg-white p-4 rounded-[2rem] shadow-sm border border-slate-100 mb-12">
            <form action="{{ route('explore') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-center">
                <div class="flex-grow w-full relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search destination name..." class="w-full pl-12 pr-4 py-4 border-none bg-slate-50 rounded-xl focus:ring-2 focus:ring-blue-500 font-medium text-slate-900 placeholder-slate-400">
                </div>

                <select name="category" class="w-full md:w-48 py-4 px-10 border-none bg-slate-50 rounded-xl focus:ring-2 focus:ring-blue-500 font-medium text-slate-900 cursor-pointer">
                    <option value="">All Categories</option>
                    <option value="Nature" {{ request('category') == 'Nature' ? 'selected' : '' }}>Nature</option>
                    <option value="Historical" {{ request('category') == 'Historical' ? 'selected' : '' }}>Historical</option>
                    <option value="Adventure" {{ request('category') == 'Adventure' ? 'selected' : '' }}>Adventure</option>
                    <option value="Cultural" {{ request('category') == 'Cultural' ? 'selected' : '' }}>Cultural</option>
                </select>

                <select name="difficulty" class="w-full md:w-48 py-4 px-10 border-none bg-slate-50 rounded-xl focus:ring-2 focus:ring-blue-500 font-medium text-slate-900 cursor-pointer">
                    <option value="">All Difficulties</option>
                    <option value="Beginner" {{ request('difficulty') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="Intermediate" {{ request('difficulty') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="Advanced" {{ request('difficulty') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                </select>

                <div class="flex gap-2 w-full md:w-auto">
                    <button type="submit" class="flex-1 md:flex-none bg-blue-600 text-white font-bold px-8 py-4 rounded-xl hover:bg-blue-700 transition shadow-md">
                        Filter
                    </button>
                    @if(request()->hasAny(['search', 'category', 'difficulty']))
                    <a href="{{ route('explore') }}" class="flex-1 md:flex-none bg-slate-100 text-slate-600 font-bold px-6 py-4 rounded-xl hover:bg-slate-200 transition text-center flex items-center justify-center">
                        Clear
                    </a>
                    @endif
                </div>
            </form>
        </div>

        @if($destinations->isEmpty())
        <div class="bg-white rounded-3xl border border-slate-100 p-16 text-center shadow-sm">
            <svg class="mx-auto h-20 w-20 text-slate-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">No destinations found</h3>
            <p class="text-slate-500 font-light">Try adjusting your search or filter criteria to find what you're looking for.</p>
            <a href="{{ route('explore') }}" class="mt-8 inline-block bg-slate-900 text-white font-bold px-8 py-3 rounded-full hover:bg-blue-600 transition">View All Destinations</a>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($destinations as $destination)
            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden group flex flex-col">
                <div class="h-64 overflow-hidden relative">
                    @if($destination->image_path)
                        <img src="{{ asset('storage/' . $destination->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $destination->name }}">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                            <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-bold text-slate-900 uppercase tracking-wider shadow-sm">
                        {{ $destination->category ?? 'Uncategorized' }}
                    </div>
                </div>
                <div class="p-8 flex-grow flex flex-col">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-2xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">{{ $destination->name }}</h3>
                        <span class="font-black text-xl text-blue-600">₱{{ number_format($destination->fee, 0) }}</span>
                    </div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="inline-flex items-center gap-1 text-xs font-bold px-3 py-1 rounded-full bg-slate-100 text-slate-600 uppercase">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            {{ $destination->difficulty_level }}
                        </span>
                    </div>
                    <p class="text-slate-500 line-clamp-3 mb-8 flex-grow leading-relaxed">{{ $destination->description }}</p>
                    
                    @auth
                    <a href="{{ route('bookings.create', ['destination' => $destination->id]) }}" class="w-full text-center bg-slate-50 text-slate-900 border border-slate-200 font-bold py-4 rounded-xl hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-colors">
                        Book Tour Now
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="w-full text-center bg-slate-50 text-slate-900 border border-slate-200 font-bold py-4 rounded-xl hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-colors">
                        Log in to Book
                    </a>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </main>

  @include('layouts.footer')
</body>
</html>
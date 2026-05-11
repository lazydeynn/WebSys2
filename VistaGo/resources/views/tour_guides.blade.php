<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VistaGo | Tour Guides</title>
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
            <h1 class="text-5xl font-extrabold text-slate-900 tracking-tight mb-4">Meet Our Tour Guides</h1>
            <p class="text-xl text-slate-500 max-w-2xl mx-auto font-light">Explore our network of expert local guides who are passionate about sharing their deep knowledge and creating unforgettable travel experiences for you.</p>
        </div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full">
        @if($guides->isEmpty())
        <div class="bg-white rounded-3xl border border-slate-100 p-16 text-center shadow-sm">
            <svg class="mx-auto h-20 w-20 text-slate-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">No tour guides found</h3>
            <p class="text-slate-500 font-light">There are currently no tour guides available. Please check back later.</p>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($guides as $guide)
            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all p-6 text-center group">
                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden mb-6 border-4 border-slate-50 group-hover:border-blue-100 transition-colors">
                    @if($guide->image_path)
                        <img src="{{ asset('storage/' . $guide->image_path) }}" class="w-full h-full object-cover" alt="{{ $guide->name }}">
                    @else
                        <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-slate-900">{{ $guide->name }}</h3>
                <p class="text-slate-500 font-medium mb-4">{{ $guide->specialization }}</p>
                <div class="bg-blue-50 text-blue-700 text-sm font-bold py-2 px-4 rounded-full inline-block">
                    ₱{{ number_format($guide->daily_rate, 0) }} / day
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </main>

    <footer class="bg-white border-t border-slate-100 py-12 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-slate-400 font-medium">
            &copy; {{ date('Y') }} VistaGo Tourism Management System. All rights reserved.
        </div>
    </footer>
</body>
</html>

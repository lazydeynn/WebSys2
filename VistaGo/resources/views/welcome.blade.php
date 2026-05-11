<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VistaGo | Explore the World</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 antialiased font-sans">
    
    <!-- Navbar -->
    @include('layouts.navigation')

    <!-- Hero Section -->
    <div class="w-full relative">
        <div class="relative w-full h-[600px] md:h-[800px] overflow-hidden flex items-center justify-center">
            <img src="https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" class="absolute inset-0 w-full h-full object-cover" alt="Hero">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
            
            <div class="relative z-10 text-center px-4 max-w-4xl">
                <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight leading-tight mb-6">
                    Explore the World with Expert Guides
                </h1>
                <p class="text-lg md:text-xl text-slate-200 font-light mb-12">
                    Curated tours, real local experiences, and journeys you'll always remember.
                </p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('explore') }}" class="bg-blue-600 text-white font-semibold px-8 py-3.5 rounded-full hover:bg-blue-700 transition shadow-lg text-lg flex items-center gap-2">
                        Book a Tour 
                    </a>
                    <a href="{{ route('explore') }}" class="bg-white/10 backdrop-blur-md text-white border border-white/20 font-semibold px-8 py-3.5 rounded-full hover:bg-white/20 transition shadow-lg text-lg">
                        Explore Destinations
                    </a>
                </div>
            </div>
        </div>

        <!-- Floating Search Bar -->
        <div class="relative -mt-16 z-20 max-w-5xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-2xl p-4 md:p-6 flex flex-col md:flex-row items-center justify-between gap-4 border border-slate-100">
                <form action="{{ route('explore') }}" method="GET" class="flex flex-col md:flex-row w-full items-center gap-4 divide-y md:divide-y-0 md:divide-x divide-slate-100">
                    <div class="w-full md:w-1/3 px-4 py-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Destination</label>
                        <input type="text" name="search" placeholder="Where are you going?" class="w-full border-0 p-0 text-slate-900 font-semibold placeholder-slate-300 focus:ring-0 text-lg">
                    </div>
                    <div class="w-full md:w-1/3 px-4 py-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Category</label>
                        <select name="category" class="w-full border-0 p-0 text-slate-900 font-semibold focus:ring-0 text-lg bg-transparent cursor-pointer">
                            <option value="">All Categories</option>
                            <option value="Nature">Nature</option>
                            <option value="Historical">Historical</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Cultural">Cultural</option>
                        </select>
                    </div>
                    <div class="w-full md:w-1/3 px-4 py-2 flex justify-end">
                        <button type="submit" class="w-full md:w-auto bg-slate-900 text-white font-bold px-8 py-4 rounded-xl hover:bg-blue-600 transition shadow-md whitespace-nowrap">
                            Search Tours
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 border-b border-slate-200 pb-20">
            <div class="flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Custom Itineraries</h3>
                <p class="text-slate-500 text-sm">Flexible and personalized tour plans designed around your interests.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Certified Guides</h3>
                <p class="text-slate-500 text-sm">Our professional guides are fully certified with deep local knowledge.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Best Price Guarantee</h3>
                <p class="text-slate-500 text-sm">We offer competitive pricing with a best price promise.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">24/7 Support</h3>
                <p class="text-slate-500 text-sm">Enjoy peace of mind with our dedicated support team available around the clock.</p>
            </div>
        </div>
    </div>

    <!-- Top Tour Categories -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">Explore Our Top Tour Categories</h2>
            <p class="text-slate-500 max-w-2xl mx-auto">Find the perfect travel style that matches your adventure from relaxing getaways to thrilling explorations.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="{{ route('explore') }}?category=Nature" class="group bg-white rounded-3xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-100 transition-all cursor-pointer">
                <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mb-4 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">Ecotourism</h3>
                <p class="text-slate-400 text-sm mt-1">Nature</p>
            </a>
            <a href="{{ route('explore') }}?category=Adventure" class="group bg-white rounded-3xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-100 transition-all cursor-pointer">
                <div class="w-16 h-16 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center mb-4 group-hover:bg-orange-600 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">Adventure Tour</h3>
                <p class="text-slate-400 text-sm mt-1">Thrill seekers</p>
            </a>
            <a href="{{ route('explore') }}?category=Cultural" class="group bg-white rounded-3xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-100 transition-all cursor-pointer">
                <div class="w-16 h-16 bg-purple-50 text-purple-600 rounded-full flex items-center justify-center mb-4 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">City Tours</h3>
                <p class="text-slate-400 text-sm mt-1">Culture</p>
            </a>
            <a href="{{ route('explore') }}" class="group bg-white rounded-3xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-100 transition-all cursor-pointer">
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">Family Tours</h3>
                <p class="text-slate-400 text-sm mt-1">Group & family</p>
            </a>
        </div>
    </div>

    <!-- Featured Destinations -->
    @if(isset($featured_destinations) && $featured_destinations->count() > 0)
    <div class="bg-white py-24 mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Top Rated Destinations</h2>
                    <p class="mt-3 text-lg text-slate-500">Discover the places our tourists love visiting the most.</p>
                </div>
                <a href="{{ route('explore') }}" class="hidden md:flex items-center gap-2 text-blue-600 font-bold hover:text-blue-800 transition">
                    See All <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featured_destinations as $destination)
                <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden group flex flex-col">
                    <div class="h-64 overflow-hidden relative">
                        @if($destination->image_path)
                            <img src="{{ asset('storage/' . $destination->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $destination->name }}">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-bold text-slate-900 uppercase tracking-wider">
                            {{ $destination->category }}
                        </div>
                    </div>
                    <div class="p-8 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-2xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">{{ $destination->name }}</h3>
                            <span class="font-black text-xl text-blue-600">₱{{ number_format($destination->fee, 0) }}</span>
                        </div>
                        <p class="text-slate-500 line-clamp-2 mb-6 flex-grow">{{ $destination->description }}</p>
                        <a href="{{ route('bookings.create', ['destination' => $destination->id]) }}" class="w-full text-center bg-slate-50 text-slate-900 border border-slate-200 font-bold py-3.5 rounded-xl hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-colors">
                            Book Tour
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Featured Guides -->
    @if(isset($expert_guides) && $expert_guides->count() > 0)
    <div class="bg-slate-50 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Featured Guides</h2>
                <p class="mt-3 text-lg text-slate-500">Meet our experienced local guides who are passionate about creating unforgettable travel experiences.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($expert_guides as $guide)
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
        </div>
    </div>
    @endif

    <!-- CTA Section -->
    @guest
    <div class="bg-blue-600 py-24">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight">Ready to start your journey?</h2>
            <p class="text-xl text-blue-100 mb-10">Sign up today and get access to exclusive deals, personalized itineraries, and direct booking with local experts.</p>
            <a href="{{ route('register') }}" class="inline-block bg-white text-blue-600 font-black text-lg px-10 py-4 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                Create Free Account
            </a>
        </div>
    </div>
    @endguest
    
    @include('layouts.footer')

</body>
</html>
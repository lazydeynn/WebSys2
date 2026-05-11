<x-app-layout>
  
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(Auth::user()->role === 'admin')

            <div class="mb-8 bg-slate-900 rounded-[2rem] shadow-xl overflow-hidden relative">
                <div class="px-10 py-12 text-white relative z-10">
                    <h3 class="text-3xl font-black mb-2 tracking-tight">VistaGo Control Center</h3>
                    <p class="text-slate-300 text-lg font-medium">Manage your regional tourist spots and personnel from here.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="bg-green-100 p-4 rounded-xl text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Est. Revenue</p>
                        <h4 class="text-xl font-black text-gray-900">₱{{ number_format($total_revenue ?? 0, 2) }}</h4>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="bg-blue-100 p-4 rounded-xl text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Bookings</p>
                        <h4 class="text-xl font-black text-gray-900">{{ $total_bookings ?? 0 }} <span class="text-sm font-normal text-gray-500">trips</span></h4>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="bg-indigo-100 p-4 rounded-xl text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Registered</p>
                        <h4 class="text-xl font-black text-gray-900">{{ $total_tourists ?? 0 }} <span class="text-sm font-normal text-gray-500">users</span></h4>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="bg-pink-100 p-4 rounded-xl text-pink-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Active Spots</p>
                        <h4 class="text-xl font-black text-gray-900">{{ $total_destinations ?? 0 }} <span class="text-sm font-normal text-gray-500">places</span></h4>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('destinations.index') }}" class="block group">
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:border-indigo-200 h-full">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">Manage Destinations</h4>
                                <p class="text-gray-500 mt-2">Add, edit, or remove locations from the catalog.</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('guides.index') }}" class="block group">
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:border-green-200 h-full">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 group-hover:text-green-600 transition-colors">Manage Tour Guides</h4>
                                <p class="text-gray-500 mt-2">Update guide profiles, and daily rates.</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('bookings.index') }}" class="block group">
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:border-blue-200 h-full">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Manage Bookings</h4>
                                <p class="text-gray-500 mt-2">Review, approve, or cancel upcoming trips.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            @else
            <div class="mb-8 bg-blue-600 rounded-[2rem] shadow-xl overflow-hidden relative">
                <div class="px-10 py-12 text-white relative z-10">
                    <h3 class="text-3xl font-black mb-2 tracking-tight">Welcome to VistaGo, {{ Auth::user()->name }}!</h3>
                    <p class="text-blue-100 text-lg font-medium">Your account is active. Here is a quick overview of your trips.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="bg-blue-100 p-4 rounded-xl text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Bookings</p>
                        <h4 class="text-xl font-black text-gray-900">{{ $total_user_bookings ?? 0 }} <span class="text-sm font-normal text-gray-500">trips</span></h4>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="bg-yellow-100 p-4 rounded-xl text-yellow-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Pending Approval</p>
                        <h4 class="text-xl font-black text-gray-900">{{ $pending_user_bookings ?? 0 }} <span class="text-sm font-normal text-gray-500">trips</span></h4>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="bg-green-100 p-4 rounded-xl text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Approved Trips</p>
                        <h4 class="text-xl font-black text-gray-900">{{ $approved_user_bookings ?? 0 }} <span class="text-sm font-normal text-gray-500">trips</span></h4>
                    </div>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('explore') }}" class="inline-block bg-blue-600 text-white font-bold px-8 py-4 rounded-xl hover:bg-blue-700 transition shadow-lg text-lg">
                    Explore Destinations
                </a>
            </div>
            @endif

        </div>
    </div>

    @include('layouts.footer')
</x-app-layout>
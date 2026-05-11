<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Bookings</h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    <div class="mb-4 flex justify-between items-center">
                        <input type="text" id="tableSearch" placeholder="Search bookings..." class="w-full md:w-1/3 border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    @if($bookings->isEmpty())
                    <div class="text-center py-16">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2 tracking-tight">No upcoming trips</h3>
                        <p class="text-slate-500 mt-1 mb-8 font-medium">You haven't booked any destinations yet.</p>
                        <a href="{{ route('explore') }}" class="bg-slate-900 text-white font-bold px-8 py-3.5 rounded-xl hover:bg-blue-600 transition shadow-lg">Explore Catalog</a>
                    </div>
                    @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse" id="dataTable">
                            <thead>
                                <tr class="border-b-2 border-gray-100 bg-gray-50 cursor-pointer">
                                    <th class="p-4 font-semibold text-gray-600 hover:text-indigo-600" onclick="sortTable(0)">Destination</th>
                                    <th class="p-4 font-semibold text-gray-600 hover:text-indigo-600" onclick="sortTable(1)">Date & Time</th>
                                    <th class="p-4 font-semibold text-gray-600 hover:text-indigo-600" onclick="sortTable(2)">Guide</th>
                                    <th class="p-4 font-semibold text-gray-600 hover:text-indigo-600" onclick="sortTable(3)">Total Price</th>
                                    <th class="p-4 font-semibold text-gray-600 hover:text-indigo-600" onclick="sortTable(4)">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr class="border-b border-gray-50 hover:bg-gray-50 transition cursor-pointer" onclick="document.getElementById('modal-{{ $booking->id }}').classList.remove('hidden')">
                                    <td class="p-4 font-bold text-gray-900">{{ $booking->destination->name }}</td>
                                    <td class="p-4 text-gray-600">
                                        {{ \Carbon\Carbon::parse($booking->visit_date)->format('M d, Y') }} 
                                        {{ $booking->end_date ? '- ' . \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') : '' }} 
                                        <br><span class="text-xs text-gray-400">@ {{ $booking->visit_time ? \Carbon\Carbon::parse($booking->visit_time)->format('h:i A') : 'N/A' }}</span>
                                    </td>
                                    <td class="p-4 text-gray-600">{{ $booking->guide ? $booking->guide->name : 'No Guide' }}</td>
                                    <td class="p-4 font-bold text-gray-900">₱{{ number_format($booking->total_price, 2) }}</td>
                                    <td class="p-4">
                                        @if($booking->status === 'Approved')
                                        <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-bold uppercase tracking-wider">Approved</span>
                                        @elseif($booking->status === 'Cancelled')
                                        <span class="bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full font-bold uppercase tracking-wider">Cancelled</span>
                                        @else
                                        <span class="bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full font-bold uppercase tracking-wider">Pending</span>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Booking Details Modal -->
                                <div id="modal-{{ $booking->id }}" class="hidden fixed inset-0 flex items-center justify-center p-4 sm:p-6 z-50 backdrop-blur-md transition-all duration-300" style="background-color: rgba(15, 23, 42, 0.6);" onclick="this.classList.add('hidden')">
                                    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden flex flex-col max-h-[95vh] relative transform scale-100 transition-transform duration-300" style="aspect-ratio: 4/5;" onclick="event.stopPropagation()">
                                        
                                        <!-- Image Header (Flexible) -->
                                        <div class="relative w-full flex-1 overflow-hidden min-h-[200px]">
                                            @if($booking->destination->image_path)
                                                <img src="{{ asset('storage/' . $booking->destination->image_path) }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ $booking->destination->name }}">
                                            @else
                                                <div class="absolute inset-0 w-full h-full flex items-center justify-center bg-gray-100 text-gray-300">
                                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                </div>
                                            @endif
                                            
                                            <!-- Dark Gradient Overlay -->
                                            <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.2) 60%, transparent 100%);"></div>
                                            
                                            <!-- Close Button -->
                                            <button onclick="document.getElementById('modal-{{ $booking->id }}').classList.add('hidden')" class="absolute top-5 right-5 text-white rounded-full p-2.5 transition z-10" style="background-color: rgba(0, 0, 0, 0.2); backdrop-filter: blur(8px);">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>

                                            <!-- Status Pill -->
                                            <div class="absolute top-6 left-6 z-10">
                                                @if($booking->status === 'Approved')
                                                <span class="text-white text-xs px-4 py-1.5 rounded-full font-bold uppercase tracking-wider shadow-sm" style="background-color: rgba(34, 197, 94, 0.9); backdrop-filter: blur(8px);">Approved</span>
                                                @elseif($booking->status === 'Cancelled')
                                                <span class="text-white text-xs px-4 py-1.5 rounded-full font-bold uppercase tracking-wider shadow-sm" style="background-color: rgba(239, 68, 68, 0.9); backdrop-filter: blur(8px);">Cancelled</span>
                                                @else
                                                <span class="text-white text-xs px-4 py-1.5 rounded-full font-bold uppercase tracking-wider shadow-sm" style="background-color: rgba(234, 179, 8, 0.9); backdrop-filter: blur(8px);">Pending</span>
                                                @endif
                                            </div>

                                            <!-- Destination Title -->
                                            <div class="absolute bottom-5 left-5 right-5 z-10">
                                                <h3 class="text-2xl sm:text-3xl font-black text-white tracking-tight leading-tight drop-shadow-lg">{{ $booking->destination->name }}</h3>
                                            </div>
                                        </div>

                                        <!-- Content Body (Shrinks to fit) -->
                                        <div class="p-5 sm:p-6 shrink-0 bg-white flex flex-col gap-5 overflow-y-auto">
                                            
                                            <div class="flex flex-col gap-3">
                                                <!-- Date & Time Row -->
                                                <div class="flex items-center gap-4 p-3.5 rounded-3xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                                                    <div class="bg-blue-50 w-12 h-12 rounded-2xl flex items-center justify-center text-blue-600 shrink-0">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                    </div>
                                                    <div class="flex-1">
                                                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-0.5">Schedule</p>
                                                        <p class="font-black text-gray-900 text-base leading-tight">
                                                            {{ \Carbon\Carbon::parse($booking->visit_date)->format('M d, Y') }}
                                                            @if($booking->end_date)
                                                            <span class="text-gray-400 font-semibold text-xs"> — {{ \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') }}</span>
                                                            @endif
                                                        </p>
                                                        <p class="text-xs text-gray-500 font-semibold mt-1">@ {{ $booking->visit_time ? \Carbon\Carbon::parse($booking->visit_time)->format('h:i A') : 'N/A' }}</p>
                                                    </div>
                                                </div>

                                                <!-- Guide Row -->
                                                <div class="flex items-center gap-4 p-3.5 rounded-3xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                                                    <div class="bg-emerald-50 w-12 h-12 rounded-2xl flex items-center justify-center text-emerald-600 shrink-0">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                                    </div>
                                                    <div class="flex-1">
                                                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-0.5">Tour Guide</p>
                                                        @if($booking->guide)
                                                            <div class="flex items-center gap-3 mt-1">
                                                                @if($booking->guide->image_path)
                                                                    <img src="{{ asset('storage/' . $booking->guide->image_path) }}" class="w-10 h-10 rounded-full object-cover shrink-0 ring-2 ring-white shadow-sm">
                                                                @else
                                                                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-400 shrink-0 ring-2 ring-white shadow-sm">
                                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                                                    </div>
                                                                @endif
                                                                <div class="overflow-hidden">
                                                                    <p class="font-black text-gray-900 text-base leading-tight truncate">{{ $booking->guide->name }}</p>
                                                                    <p class="text-xs text-gray-500 font-semibold truncate mt-0.5">{{ $booking->guide->specialization }}</p>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <p class="font-black text-gray-900 text-base mt-1">None</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Price Footer -->
                                            <div class="bg-gray-900 rounded-[1.5rem] p-5 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 shadow-xl mt-1">
                                                <div>
                                                    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Total Paid</p>
                                                    <p class="text-2xl font-black text-white tracking-tight mt-0.5">₱{{ number_format($booking->total_price, 2) }}</p>
                                                </div>
                                                @if($booking->status === 'Approved')
                                                <a href="{{ route('bookings.permit', $booking) }}" class="bg-white text-gray-900 font-black px-6 py-3.5 rounded-xl hover:bg-gray-100 transition-colors shadow-md flex items-center justify-center gap-2 text-sm shrink-0 w-full sm:w-auto">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                                    Permit
                                                </a>
                                                @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
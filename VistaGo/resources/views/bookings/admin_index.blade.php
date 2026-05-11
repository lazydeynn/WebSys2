<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage All Bookings</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-8 text-gray-900 overflow-x-auto">
                    <div class="mb-4 flex justify-between items-center">
                        <input type="text" id="tableSearch" placeholder="Search bookings..." class="w-full md:w-1/3 border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <table class="w-full text-left border-collapse" id="dataTable">
                        <thead>
                            <tr class="border-b-2 border-gray-100 bg-gray-50 cursor-pointer">
                                <th class="p-4 font-semibold text-gray-600 hover:text-indigo-600" onclick="sortTable(0)">Tourist Name</th>
                                <th class="p-4 font-semibold text-gray-600 hover:text-indigo-600" onclick="sortTable(1)">Destination</th>
                                <th class="p-4 font-semibold text-gray-600 hover:text-indigo-600" onclick="sortTable(2)">Date & Time</th>
                                <th class="p-4 font-semibold text-gray-600 hover:text-indigo-600" onclick="sortTable(3)">Total Price</th>
                                <th class="p-4 font-semibold text-gray-600 text-right cursor-default">Action / Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="p-4 font-medium text-gray-900">{{ $booking->user->name }}</td>
                                <td class="p-4 text-gray-600">{{ $booking->destination->name }}</td>
                                <td class="p-4 text-gray-600">
                                    {{ \Carbon\Carbon::parse($booking->visit_date)->format('M d, Y') }} 
                                    {{ $booking->end_date ? '- ' . \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') : '' }} 
                                    <br><span class="text-xs text-gray-400">@ {{ $booking->visit_time ? \Carbon\Carbon::parse($booking->visit_time)->format('h:i A') : 'N/A' }}</span>
                                </td>
                                <td class="p-4 font-bold text-gray-900">₱{{ number_format($booking->total_price, 2) }}</td>
                                <td class="p-4 text-right">
                                    <form action="{{ route('bookings.update', $booking) }}" method="POST" class="flex items-center justify-end gap-2">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" onchange="this.form.submit()">
                                            <option value="Pending" {{ $booking->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Approved" {{ $booking->status === 'Approved' ? 'selected' : '' }}>Approve</option>
                                            <option value="Cancelled" {{ $booking->status === 'Cancelled' ? 'selected' : '' }}>Cancel</option>
                                        </select>
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
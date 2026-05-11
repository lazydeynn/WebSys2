<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Complete Your Booking</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">

                <div class="bg-blue-600 px-10 py-8 text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-3xl font-black tracking-tight">{{ $destination->name }}</h3>
                        <p class="text-blue-100 mt-2 text-lg font-medium">Entry Fee: ₱{{ number_format($destination->fee, 2) }}</p>
                    </div>
                </div>

                <div class="p-8 text-gray-900">
                    <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="destination_id" value="{{ $destination->id }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Start Date *</label>
                                <input type="date" name="visit_date" min="{{ date('Y-m-d') }}" value="{{ old('visit_date') }}" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('visit_date') border-red-500 ring-red-500 @enderror" required>

                                @error('visit_date')
                                <p class="text-sm text-red-600 mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @else
                                <p class="text-xs text-gray-500 mt-1">Please select a date from today onwards.</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">End Date (Optional)</label>
                                <input type="date" name="end_date" min="{{ date('Y-m-d') }}" value="{{ old('end_date') }}" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('end_date') border-red-500 ring-red-500 @enderror">

                                @error('end_date')
                                <p class="text-sm text-red-600 mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Select Visit Time *</label>
                                <select name="visit_time" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('visit_time') border-red-500 ring-red-500 @enderror" required>
                                    <option value="">Select Time</option>
                                    <option value="08:00" {{ old('visit_time') == '08:00' ? 'selected' : '' }}>8:00 AM</option>
                                    <option value="08:30" {{ old('visit_time') == '08:30' ? 'selected' : '' }}>8:30 AM</option>
                                    <option value="09:00" {{ old('visit_time') == '09:00' ? 'selected' : '' }}>9:00 AM</option>
                                    <option value="09:30" {{ old('visit_time') == '09:30' ? 'selected' : '' }}>9:30 AM</option>
                                    <option value="10:00" {{ old('visit_time') == '10:00' ? 'selected' : '' }}>10:00 AM</option>
                                    <option value="10:30" {{ old('visit_time') == '10:30' ? 'selected' : '' }}>10:30 AM</option>
                                    <option value="11:00" {{ old('visit_time') == '11:00' ? 'selected' : '' }}>11:00 AM</option>
                                    <option value="11:30" {{ old('visit_time') == '11:30' ? 'selected' : '' }}>11:30 AM</option>
                                    <option value="12:00" {{ old('visit_time') == '12:00' ? 'selected' : '' }}>12:00 PM</option>
                                    <option value="12:30" {{ old('visit_time') == '12:30' ? 'selected' : '' }}>12:30 PM</option>
                                    <option value="13:00" {{ old('visit_time') == '13:00' ? 'selected' : '' }}>1:00 PM</option>
                                    <option value="13:30" {{ old('visit_time') == '13:30' ? 'selected' : '' }}>1:30 PM</option>
                                    <option value="14:00" {{ old('visit_time') == '14:00' ? 'selected' : '' }}>2:00 PM</option>
                                    <option value="14:30" {{ old('visit_time') == '14:30' ? 'selected' : '' }}>2:30 PM</option>
                                    <option value="15:00" {{ old('visit_time') == '15:00' ? 'selected' : '' }}>3:00 PM</option>
                                    <option value="15:30" {{ old('visit_time') == '15:30' ? 'selected' : '' }}>3:30 PM</option>
                                    <option value="16:00" {{ old('visit_time') == '16:00' ? 'selected' : '' }}>4:00 PM</option>
                                    <option value="16:30" {{ old('visit_time') == '16:30' ? 'selected' : '' }}>4:30 PM</option>
                                    <option value="17:00" {{ old('visit_time') == '17:00' ? 'selected' : '' }}>5:00 PM</option>
                                </select>

                                @error('visit_time')
                                <p class="text-sm text-red-600 mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Require a Tour Guide? (Optional)</label>
                            <select name="guide_id" id="guideSelect" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="" data-rate="0">No Guide Needed - I will explore myself</option>
                                @foreach($guides as $guide)
                                <option value="{{ $guide->id }}" data-rate="{{ $guide->daily_rate }}">
                                    {{ $guide->name }} - {{ $guide->specialization }} (+₱{{ number_format($guide->daily_rate, 2) }}/day)
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 flex justify-between items-center mt-6">
                            <div>
                                <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-1">Total Cost</h4>
                                <p class="text-xs text-gray-400">Includes destination fee and guide daily rate</p>
                            </div>
                            <div class="text-right">
                                <span class="text-3xl font-black text-indigo-600" id="totalPriceDisplay">₱{{ number_format($destination->fee, 2) }}</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-8 border-t border-slate-100 pt-6">
                            <a href="{{ url('/') }}" class="text-slate-500 hover:text-slate-900 font-bold transition">Cancel</a>
                            <button type="submit" class="bg-blue-600 text-white px-8 py-4 rounded-xl hover:bg-blue-700 transition shadow-lg font-bold text-lg">
                                Confirm Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const destinationFee = {{ $destination->fee }};
            const guideSelect = document.getElementById('guideSelect');
            const totalPriceDisplay = document.getElementById('totalPriceDisplay');
            const visitDateInput = document.querySelector('input[name="visit_date"]');
            const endDateInput = document.querySelector('input[name="end_date"]');

            function getDuration() {
                if (!visitDateInput.value) return 1;
                
                const start = new Date(visitDateInput.value);
                const end = endDateInput.value ? new Date(endDateInput.value) : new Date(visitDateInput.value);
                
                // If end date is before start date, default to 1 day to avoid negative cost (validation will handle this on backend)
                if (end < start) return 1;

                const diffTime = Math.abs(end - start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 to make it inclusive
                return diffDays;
            }

            function updatePrice() {
                const duration = getDuration();
                const selectedOption = guideSelect.options[guideSelect.selectedIndex];
                const guideRate = parseFloat(selectedOption.getAttribute('data-rate')) || 0;
                
                // Destination fee is applied once, guide rate is applied per day
                const total = destinationFee + (guideRate * duration);
                
                // Format as currency
                totalPriceDisplay.textContent = '₱' + total.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }

            guideSelect.addEventListener('change', updatePrice);
            visitDateInput.addEventListener('change', updatePrice);
            endDateInput.addEventListener('change', updatePrice);
        });
    </script>
</x-app-layout>
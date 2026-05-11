<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Graph Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h3 class="text-lg font-bold text-gray-700 mb-6 border-b pb-2">Monthly Sales</h3>
                    
                    <div style="position: relative; height:40vh; width:100%">
                        <canvas id="salesChart"></canvas> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('salesChart').getContext('2d'); 
            const labels = @json($labels); 
            const data = @json($data);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels, 
                    datasets: [{ 
                        label: 'Total Revenue (PHP)', 
                        data: data, 
                        
                        backgroundColor: [
                            'rgba(79, 70, 229, 0.8)',
                            'rgba(124, 58, 237, 0.8)', 
                            'rgba(236, 72, 153, 0.8)', 
                            'rgba(245, 158, 11, 0.8)'  
                        ],
                        borderRadius: 6, 
                        borderWidth: 0
                    }]
                },
                options: { 
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false } 
                    },
                    scales: { 
                        y: { 
                            beginAtZero: true,
                            grid: { borderDash: [5, 5] } 
                        },
                        x: {
                            grid: { display: false } 
                        }
                    } 
                } 
            });
        });
    </script>
</x-app-layout>
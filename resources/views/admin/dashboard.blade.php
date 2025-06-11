<x-layouts.app :title="__('Admin Dashboard')">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="flex flex-col gap-6">
        <h2 class="text-center font-bold text-2xl text-blue-500" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
            {{ __('Dashboard') }} - {{ $center->name }}
        </h2>

        {{-- Estadísticas del centro --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            {{-- Total Usuarios del Centro --}}
            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium">Usuarios del Centro</p>
                        <p class="text-3xl font-bold mt-2">{{ $totalUsuarios }}</p>
                    </div>
                    <svg class="w-8 h-8 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>

            {{-- Nuevos Usuarios Hoy --}}
            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white">Nuevos Usuarios Hoy</p>
                        <p class="text-3xl font-bold mt-2">{{ $usuariosHoy }}</p>
                    </div>
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Contenido Multimedia del Centro --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium">Videos del Centro</p>
                        <p class="text-3xl font-bold mt-2">{{ $totalVideos }}</p>
                    </div>
                    <svg class="w-8 h-8 text-red-500 opacity-75" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M21 7.5l-5.197 3.114a1 1 0 0 0 0 1.772L21 15.5V7.5zM3 5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5z"/>
                    </svg>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white">Posts del Centro</p>
                        <p class="text-3xl font-bold mt-2">{{ $totalPost }}</p>
                    </div>
                    <svg class="w-8 h-8 text-orange-500 opacity-75" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 3h16c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2zm0 2v14h16V5H4zm4 3h8v2H8V8zm0 4h8v2H8v-2z"/>
                    </svg>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white">Podcasts del Centro</p>
                        <p class="text-3xl font-bold mt-2">{{ $totalPodcast }}</p>
                    </div>
                    <svg class="w-8 h-8 text-yellow-500 opacity-75" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1a4 4 0 0 1 4 4v6a4 4 0 0 1-8 0V5a4 4 0 0 1 4-4zm1 15.93a6.002 6.002 0 0 0 5-5.917V10a1 1 0 1 0-2 0v1.013a4.002 4.002 0 0 1-6 3.874 4.002 4.002 0 0 1-2-3.874V10a1 1 0 1 0-2 0v.013a6.002 6.002 0 0 0 5 5.917V19H8a1 1 0 1 0 0 2h8a1 1 0 1 0 0-2h-3v-2.07z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Gráficos --}}
        <div class="rounded-xl border p-5 bg-white shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Usuarios por mes ({{ $center->name }})</h2>
            </div>
            <div class="aspect-video bg-gray-50 rounded-xl flex items-center justify-center">
                <canvas id="usuariosMensuales"></canvas>
            </div>
        </div>

        <div class="rounded-xl border p-5 bg-white shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Contenido del Centro</h2>
            </div>
            <div class="aspect-video bg-gray-50 rounded-xl flex items-center justify-center">
                <canvas id="totales"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Gráfico de usuarios por mes
        const ctxUsuariosMensuales = document.getElementById('usuariosMensuales').getContext('2d');
        const usuariosMensualesChart = new Chart(ctxUsuariosMensuales, {
            type: 'line',
            data: {
                labels: @json($meses),
                datasets: [{
                    label: 'Usuarios registrados',
                    data: @json($cantidadUsuarios),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // Gráfico de contenido del centro
        const ctxTotales = document.getElementById('totales').getContext('2d');
        const totalesChart = new Chart(ctxTotales, {
            type: 'bar',
            data: {
                labels: ['Videos', 'Podcasts', 'Posts'],
                datasets: [{
                    label: 'Cantidad',
                    data: [@json($totales['videos']), @json($totales['podcasts']), @json($totales['posts'])],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
</x-layouts.app>

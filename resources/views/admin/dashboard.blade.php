<x-layouts.app :title="__('Admin Dashboard')">
    @include('partials.navigation')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="flex flex-col gap-6">
        <h2 class="text-center font-bold text-2xl text-blue-500" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
           {{__('Dashboard')}}
        </h2>
        {{-- Header Estadísticas 1ºFILA--}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium">Total Usuarios</p>
                        <p class="text-3xl font-bold mt-2">{{ $totalUsuarios }}</p>
                    </div>
                    <svg class="w-8 h-8 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">Centros Activos</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $centrosActivos }}</p>
                    </div>
                    <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">Centros Inactivos</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $centrosInactivos }}</p>
                    </div>
                    <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">Actividad Hoy</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $usuariosHoy }}</p>
                    </div>
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Header Estadísticas 2ºFILA--}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium">Total Videos</p>
                        <p class="text-3xl font-bold mt-2">{{ $totalVideos }}</p>
                    </div>
                    <svg class="w-8 h-8 text-red-500 opacity-75" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7.5l-5.197 3.114a1 1 0 0 0 0 1.772L21 15.5V7.5zM3 5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5z"/>
                    </svg>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">Total Post</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $totalPost }}</p>
                    </div>
                    <svg class="w-8 h-8 text-orange-500 opacity-75" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 3h16c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2zm0 2v14h16V5H4zm4 3h8v2H8V8zm0 4h8v2H8v-2z"/>
                    </svg>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">Total Podcast</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $totalPodcast }}</p>
                    </div>
                    <svg class="w-8 h-8 text-yellow-500 opacity-75" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 1a4 4 0 0 1 4 4v6a4 4 0 0 1-8 0V5a4 4 0 0 1 4-4zm1 15.93a6.002 6.002 0 0 0 5-5.917V10a1 1 0 1 0-2 0v1.013a4.002 4.002 0 0 1-6 3.874 4.002 4.002 0 0 1-2-3.874V10a1 1 0 1 0-2 0v.013a6.002 6.002 0 0 0 5 5.917V19H8a1 1 0 1 0 0 2h8a1 1 0 1 0 0-2h-3v-2.07z"/>
                    </svg>
                </div>
            </div>
        </div>
        {{-- Principal --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Columna Derecha --}}
            <div class="flex gap-x-4 gap-3">
                <button class="p-4 rounded-xl cursor-pointer bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group hover:bg-green-200 dark:hover:bg-green-800">
                    <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-green-400">Invitar Usuario</span>
                </button>

                <!-- Botón Exportar Usuarios -->
                <form action="{{ route('users.export') }}" method="GET">
                    <button class="p-4 cursor-pointer rounded-xl bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group w-full hover:bg-yellow-200 dark:hover:bg-yellow-800">
                        <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2m-5-4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-yellow-400">Exportar Usuarios</span>
                    </button>
                </form>

                <!-- Botón Importar Usuarios -->
                <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="block cursor-pointer p-4 rounded-xl bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group hover:bg-green-200 dark:hover:bg-green-800">
                        <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-green-400">Importar Usuarios</span>
                        <input type="file" name="file" class="hidden" accept=".xlsx,.xls,.csv" onchange="this.form.submit()">
                    </label>
                </form>

                <!-- Botón Exportar Centros -->
                <form action="{{ route('centers.export') }}" method="GET">
                    <button class="p-4 cursor-pointer rounded-xl bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group w-full hover:bg-yellow-200 dark:hover:bg-yellow-800">
                        <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2m-5-4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-yellow-400">Exportar Centros</span>
                    </button>
                </form>

                <!-- Botón Importar Centros -->
                <form action="{{ route('centers.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="block cursor-pointer p-4 rounded-xl bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group hover:bg-green-200 dark:hover:bg-green-800">
                        <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-green-400">Importar Centros</span>
                        <input type="file" name="file" class="hidden" accept=".xlsx,.xls,.csv" onchange="this.form.submit()">
                    </label>
                </form>
            </div>
        </div>
        {{-- Gráfico de usuarios nuevos por mes --}}
        <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold dark:text-white">Usuarios por mes</h2>
            </div>
            <div class="aspect-video bg-gray-50 dark:bg-neutral-800 rounded-xl flex items-center justify-center">
                <canvas id="usuariosMensuales"></canvas>
            </div>
        </div>

        <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold dark:text-white">Totales</h2>
            </div>
            <div class="aspect-video bg-gray-50 dark:bg-neutral-800 rounded-xl flex items-center justify-center">
                <canvas id="totales"></canvas>
            </div>
        </div>
    </div>

    <!-- Gráfico de usuarios mensuales -->
    <script>
        // Obtener los datos desde Blade
        const meses = @json($meses);
        const cantidadUsuarios = @json($cantidadUsuarios);

        // Crear el gráfico
        const ctx = document.getElementById('usuariosMensuales').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: meses, // Meses en el eje X
                datasets: [{
                    label: 'Usuarios Nuevos',
                    data: cantidadUsuarios,
                    borderColor: '#2196f3',
                    backgroundColor: 'rgba(33, 150, 243, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw + ' usuarios';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                        }
                    }
                }
            }
        });
    </script>
    <!-- Gráfico de totales -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Obtener los datos desde Blade
            const totales = @json($totales);

            // Crear el gráfico
            const ctx = document.getElementById('totales').getContext('2d');
            new Chart(ctx, {
                type: 'bar', // Usamos un gráfico de barras
                data: {
                    labels: ['Videos', 'Podcasts', 'Posts'], // Etiquetas en el eje X
                    datasets: [{
                        label: 'Totales',
                        data: [totales.videos, totales.podcasts, totales.posts], // Datos
                        backgroundColor: ['#f44336', '#ff9800', '#ffeb3b'],
                        borderColor: ['#f44336', '#ff9800', '#ffeb3b'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.raw + ' unidades'; // Sumar 'unidades' a los valores
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                            }
                        }
                    }
                }
            });
        });
    </script>

</x-layouts.app>


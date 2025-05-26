<x-layouts.app :title="__('SuperAdmin Dashboard')">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <div class="flex flex-col gap-6">

        <h2 class="text-center font-bold text-2xl text-blue-500" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
            {{__('Dashboard')}}
        </h2>
        {{-- Principal --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Izquierda --}}
            <div class="lg:col-span-2 space-y-6">
            </div>

            {{-- Columna Derecha --}}
            <div class="space-y-6">
                {{-- Acciones Rápidas --}}
                <div class="grid grid-cols-2 gap-4">
                    <button class="p-4 rounded-xl cursor-pointer bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group hover:bg-blue-200 dark:hover:bg-blue-800">
                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-blue-400">Nuevo Proyecto</span>
                    </button>

                    <button class="p-4 rounded-xl cursor-pointer bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group hover:bg-green-200 dark:hover:bg-green-800">
                        <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-green-400">Invitar Usuario</span>
                    </button>
                </div>

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

</x-layouts.app>

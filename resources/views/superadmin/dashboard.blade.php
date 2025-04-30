<x-layouts.app :title="__('SuperAdmin Dashboard')">
    <div class="flex flex-col gap-6">

        <h2 class="text-center font-bold text-2xl text-blue-500" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
            Panel de Control
        </h2>
        {{-- Header Estadísticas --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium">Total Usuarios</p>
                        <p class="text-3xl font-bold mt-2">{{ $totalUsuarios }}</p>
                    </div>
                    <svg class="w-12 h-12 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">Centros Activos</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $Centros }}</p>
                    </div>
                    <svg class="w-12 h-12 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>


            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">Actividad Hoy</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $PostHoy }}</p>
                    </div>
                    <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Principal --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Izquierda --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Mapa Interactivo --}}
                <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
                    <h2 class="text-lg font-semibold mb-4 dark:text-white">Distribución Global de Centros</h2>
                    <div class="relative w-full h-96 bg-gray-50 dark:bg-neutral-800 rounded-xl overflow-hidden">
                        <div id="map" class="w-full h-full"></div>
                    </div>
                </div>

                {{-- Gráfico de Actividad --}}
                <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold dark:text-white">Actividad Mensual</h2>
                        <div class="flex gap-2">
                            <button class="text-xs px-3 py-1 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">Usuarios</button>
                            <button class="text-xs px-3 py-1 rounded-full bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">Proyectos</button>
                        </div>
                    </div>
                    <div class="aspect-video bg-gray-50 dark:bg-neutral-800 rounded-xl flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-2xl text-gray-400 mb-2">📈</div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Gráfico interactivo (placeholder)</p>
                        </div>
                    </div>
                </div>
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

                <!-- Botón Exportar Usuarios -->
                <div class="grid grid-cols-2 gap-4">
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
                </div>

                <!-- Botón Exportar Centros -->
                <div class="grid grid-cols-2 gap-4">
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
                {{-- Alertas del Sistema --}}
                <div class="rounded-xl border border-red-200 dark:border-red-900/50 bg-red-50 dark:bg-red-900/20 p-5 shadow-lg">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-red-700 dark:text-red-400 mb-2">Acciones Requeridas</h3>
                            <ul class="space-y-2 text-sm text-red-600 dark:text-red-300">
                                <li class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                                    3 Proyectos sin revisar
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                                    15 Documentos pendientes
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                                    2 Centros inactivos
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Actividad Reciente --}}
                <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
                    <h2 class="text-lg font-semibold mb-4 dark:text-white">Actividad Reciente</h2>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium dark:text-gray-300">Nuevo proyecto aprobado</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Hace 2 horas • Por Admin</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium dark:text-gray-300">Nuevo usuario registrado</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Hace 4 horas • jperez@mail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

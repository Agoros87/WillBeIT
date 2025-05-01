<x-layouts.app :title="__('SuperAdmin Dashboard')">
    <div class="flex flex-col gap-6">

        <h2 class="text-center font-bold text-2xl text-blue-500" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
            Panel de Control
        </h2>
        {{-- Header Estadísticas 1ºFILA--}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
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
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $centrosActivos }}</p>
                    </div>
                    <svg class="w-12 h-12 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <svg class="w-12 h-12 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <svg class="w-12 h-12 text-red-500 opacity-75" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                    <svg class="w-12 h-12 text-orange-500 opacity-75" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 3h16c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2zm0 2v14h16V5H4zm4 3h8v2H8V8zm0 4h8v2H8v-2z"/>
                    </svg>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">Total Podcast</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $totalVideos }}</p>
                    </div>
                    <svg class="w-12 h-12 text-yellow-500 opacity-75" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 1a4 4 0 0 1 4 4v6a4 4 0 0 1-8 0V5a4 4 0 0 1 4-4zm1 15.93a6.002 6.002 0 0 0 5-5.917V10a1 1 0 1 0-2 0v1.013a4.002 4.002 0 0 1-6 3.874 4.002 4.002 0 0 1-2-3.874V10a1 1 0 1 0-2 0v.013a6.002 6.002 0 0 0 5 5.917V19H8a1 1 0 1 0 0 2h8a1 1 0 1 0 0-2h-3v-2.07z"/>
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
                    <button class="p-4 rounded-xl bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group">
                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-blue-600">Nuevo Proyecto</span>
                    </button>

                    <button class="p-4 rounded-xl bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group">
                        <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-green-600">Invitar Usuario</span>
                    </button>
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

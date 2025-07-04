<x-layouts.app :title="__('SuperAdmin Dashboard')">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <div class="flex flex-col gap-6">

        <h1 class="text-center header-1" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
            {{__('Dashboard')}}
        </h1>
        {{-- Header Estadísticas 1ºFILA--}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium">{{__("Total Users")}}</p>
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
                        <p class="text-sm text-white dark:text-white">{{__("Active Centers")}}</p>
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
                        <p class="text-sm text-white dark:text-white">{{__("Inactive Centers")}}</p>
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
                        <p class="text-sm text-white dark:text-white">{{__("Today Activity")}}</p>
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
                        <p class="text-sm font-medium">{{__("Total Videos")}}</p>
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
                        <p class="text-sm text-white dark:text-white">{{__("Total Posts")}}</p>
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
                        <p class="text-sm text-white dark:text-white">{{__("Total Podcasts")}}</p>
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
            {{-- Izquierda --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Mapa Interactivo --}}
                <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
                    <h2 class="text-lg font-semibold mb-4 dark:text-white">{{__("Global distribution of centers")}}</h2>
                    <div class="relative w-full h-96 bg-gray-50 dark:bg-neutral-800 rounded-xl overflow-hidden">
                        <div id="map" style="height: 100%; width: 100%; min-height: 400px;"></div>
                    </div>
                    <ul id="country-list" class="mt-4 text-sm text-gray-700 dark:text-white list-disc pl-5">

                    </ul>
                </div>
            </div>

            {{-- Columna Derecha --}}
            <div class="space-y-6">
                {{-- Acciones Rápidas --}}
                <!-- Botón Exportar Usuarios -->
                <div class="grid grid-cols-2 gap-4">
                    <form action="{{ route('users.export') }}" method="GET">
                        <button class="p-4 cursor-pointer rounded-xl bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group w-full hover:bg-yellow-200 dark:hover:bg-yellow-800">
                            <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2m-5-4l-3 3m0 0l-3-3m3 3V4"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-yellow-400">{{__("Export Users")}}</span>
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
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-green-400">{{__("Import Users")}}</span>
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
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-yellow-400">{{__("Export Centers")}}</span>
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
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-green-400">{{__("Import Centers")}}</span>
                            <input type="file" name="file" class="hidden" accept=".xlsx,.xls,.csv" onchange="this.form.submit()">
                        </label>
                    </form>
                </div>
            </div>
        </div>
        {{-- Gráfico de usuarios nuevos por mes --}}
        <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold dark:text-white">{{__("Month Users")}}</h2>
            </div>
            <div class="aspect-video bg-gray-50 dark:bg-neutral-800 rounded-xl flex items-center justify-center">
                <canvas id="usuariosMensuales"></canvas>
            </div>
        </div>

        <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold dark:text-white">{{__("Total")}}</h2>
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
                    label: '{{__("New Users")}}',
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
                    labels: ['{{__("Videos")}}', '{{__("Podcasts")}}', '{{__("Posts")}}'], // Etiquetas en el eje X
                    datasets: [{
                        label: '{{__("Total")}}',
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
    <!-- Mapa Interactivo -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const map = L.map('map').setView([20, 0], 2);

            // Añadir capa base de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Cargar las marcas guardadas en el localStorage
            const storedMarkers = JSON.parse(localStorage.getItem('markers')) || [];
            storedMarkers.forEach((markerData, index) => {
                const marker = L.marker([markerData.latitude, markerData.longitude]).addTo(map);
                marker.bindPopup(`<b>${markerData.country}</b><br>${markerData.info || 'Información no disponible'}`);  // Mostrar el país y la info

                // Agregar el país a la lista de países en el ul
                const countryList = document.getElementById('country-list');
                const countryItem = document.createElement('li');
                countryItem.textContent = markerData.country;

                // Crear el textarea con espacio debajo del nombre del país
                const textarea = document.createElement('textarea');
                textarea.placeholder = 'Añadir información...';
                textarea.value = markerData.info || '';  // Si ya tiene info, la ponemos como valor predeterminado
                textarea.style.marginTop = '8px';  // Añadir un margen superior para separar el textarea del país
                textarea.style.padding = '8px';  // Añadir algo de relleno al textarea
                textarea.style.border = 'none';  // Sin borde
                textarea.style.backgroundColor = 'transparent';  // Fondo transparente
                textarea.style.outline = 'none';  // Sin borde de foco
                textarea.style.fontSize = '14px';  // Ajustar el tamaño de la fuente
                textarea.style.color = '#333';  // Color del texto
                textarea.style.width = '100%';  // Ancho del textarea para ocupar todo el espacio disponible
                textarea.style.boxSizing = 'border-box';  // Asegurarnos de que el tamaño del textarea no se vea afectado por el relleno
                textarea.style.height = '100px';  // Ajustar la altura para que sea más grande

                // Escuchar cuando el usuario termine de escribir y hacer clic fuera del campo
                textarea.addEventListener('blur', function () {
                    // Actualizamos la info del marcador
                    markerData.info = textarea.value;  // Actualizar la información del marcador
                    localStorage.setItem('markers', JSON.stringify(storedMarkers));  // Guardar en localStorage

                    // Actualizamos el popup del marcador
                    marker.bindPopup(`<b>${markerData.country}</b><br>${markerData.info || 'Información no disponible'}`);
                });

                // Añadir el textarea debajo del nombre del país
                countryItem.appendChild(document.createElement('br'));  // Salto de línea para separar el país del textarea
                countryItem.appendChild(textarea);  // Añadir el textarea debajo del nombre del país
                countryList.appendChild(countryItem);

                // Eliminar marcador al hacer clic
                marker.on('click', function () {
                    // Eliminar del mapa
                    map.removeLayer(marker);
                    // Eliminar del localStorage
                    storedMarkers.splice(index, 1);
                    localStorage.setItem('markers', JSON.stringify(storedMarkers));
                    // Eliminar de la lista de países
                    countryList.removeChild(countryItem);
                });
            });

            // Escuchar clics en el mapa
            map.on('click', function (e) {
                const { lat, lng } = e.latlng;

                // Reverse geocoding para obtener el país
                fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                    .then(res => res.json())
                    .then(data => {
                        const country = data?.address?.country || "Unknown";  // Verifica que el país esté disponible

                        // Crear y agregar el marcador
                        const marker = L.marker([lat, lng]).addTo(map);
                        marker.bindPopup(`<b>${country}</b><br>Información no disponible`);  // Mostrar el país sin info inicial

                        // Guardar el marcador en el localStorage
                        storedMarkers.push({ latitude: lat, longitude: lng, country: country, info: '' });
                        localStorage.setItem('markers', JSON.stringify(storedMarkers));

                        // Agregar el país a la lista de países en el ul
                        const countryList = document.getElementById('country-list');
                        const countryItem = document.createElement('li');
                        countryItem.textContent = country;

                        // Crear el textarea con espacio debajo del nombre del país
                        const textarea = document.createElement('textarea');
                        textarea.placeholder = 'Añadir información...';

                        // Estilo similar al anterior
                        textarea.style.marginTop = '8px';
                        textarea.style.padding = '8px';
                        textarea.style.border = 'none';
                        textarea.style.backgroundColor = 'transparent';
                        textarea.style.outline = 'none';
                        textarea.style.fontSize = '14px';
                        textarea.style.color = '#333';
                        textarea.style.width = '100%';
                        textarea.style.boxSizing = 'border-box';
                        textarea.style.height = '100px';  // Ajustar la altura del textarea

                        // Escuchar cuando el usuario termine de escribir y hacer clic fuera del campo
                        textarea.addEventListener('blur', function () {
                            // Actualizar la información del marcador
                            const markerIndex = storedMarkers.findIndex(m => m.latitude === lat && m.longitude === lng);
                            if (markerIndex > -1) {
                                storedMarkers[markerIndex].info = textarea.value;
                                localStorage.setItem('markers', JSON.stringify(storedMarkers));

                                // Actualizar el popup del marcador
                                marker.bindPopup(`<b>${country}</b><br>${storedMarkers[markerIndex].info || 'Información no disponible'}`);
                            }
                        });

                        // Añadir el salto de línea y el campo de texto al li del país
                        countryItem.appendChild(document.createElement('br'));  // Salto de línea
                        countryItem.appendChild(textarea);   // Añadir el textarea debajo del nombre del país
                        countryList.appendChild(countryItem);

                        // Eliminar marcador al hacer clic
                        marker.on('click', function () {
                            // Eliminar del mapa
                            map.removeLayer(marker);
                            // Eliminar del localStorage
                            const index = storedMarkers.findIndex(m => m.latitude === lat && m.longitude === lng);
                            if (index > -1) {
                                storedMarkers.splice(index, 1);
                                localStorage.setItem('markers', JSON.stringify(storedMarkers));
                            }
                            // Eliminar de la lista de países
                            countryList.removeChild(countryItem);
                        });
                    })
                    .catch(err => console.error('Error al obtener el país:', err));
            });
        });
    </script>


</x-layouts.app>

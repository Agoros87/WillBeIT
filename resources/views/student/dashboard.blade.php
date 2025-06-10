<x-layouts.app :title="__('Student Dashboard')">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="flex flex-col gap-6">

        <h2 class="text-center font-bold text-2xl text-blue-500" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
            {{ __('Dashboard') }}
        </h2>

        {{-- Statistics Header --}}
        <div class="grid grid-cols-1 md:grid-cols-5 gap-5">
            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium">{{ __('My Posts') }}</p>
                        <p class="text-3xl font-bold mt-2">{{ $myPost }}</p>
                    </div>
                    <x-svg.post-icon class="w-8 h-8 opacity-75"/>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">{{ __('My Podcasts') }}</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $myPodcast }}</p>
                    </div>
                    <x-svg.podcast-icon class="w-8 h-8 text-yellow-500 opacity-75"/>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">{{ __('My Videos') }}</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $myVideos }}</p>
                    </div>
                    <x-svg.video-icon class="w-8 h-8 text-red-500 opacity-75"/>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">{{ __('My Comments') }}</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $myComments }}</p>
                    </div>
                    <x-svg.comments-icon class="w-8 h-8 text-green-500 opacity-75"/>
                </div>
            </div>

            <div class="rounded-xl border p-5 bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-white dark:text-white">{{ __('My Favorites') }}</p>
                        <p class="text-3xl font-bold mt-2 dark:text-white">{{ $myFavorites }}</p>
                    </div>
                    <x-svg.heart-icon class="w-8 h-8 text-pink-500 opacity-75"/>
                </div>
            </div>
        </div>

        {{-- Main --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Left --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Recent Activity --}}
                <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
                    <h2 class="text-lg font-semibold mb-4 dark:text-white">{{ __('My Recent Activity in the Last Week') }}</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-neutral-800 rounded-lg">
                            <div class="flex items-center gap-3">
                                <x-svg.post-icon class="w-5 h-5 text-blue-500"/>
                                <span class="text-sm font-medium dark:text-white">{{ __('Posts Created') }}</span>
                            </div>
                            <span class="text-lg font-bold text-blue-500">{{ $lastActivity['posts'] }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-neutral-800 rounded-lg">
                            <div class="flex items-center gap-3">
                                <x-svg.podcast-icon class="w-5 h-5 text-yellow-500"/>
                                <span class="text-sm font-medium dark:text-white">{{ __('Podcasts Created') }}</span>
                            </div>
                            <span class="text-lg font-bold text-yellow-500">{{ $lastActivity['podcasts'] }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-neutral-800 rounded-lg">
                            <div class="flex items-center gap-3">
                                <x-svg.video-icon class="w-5 h-5 text-red-500"/>
                                <span class="text-sm font-medium dark:text-white">{{ __('Videos Created') }}</span>
                            </div>
                            <span class="text-lg font-bold text-red-500">{{ $lastActivity['videos'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column --}}
            <div class="space-y-6">
                {{-- Quick Actions --}}
                <div class="grid grid-cols-1 gap-4">
                    <a href="{{ route('posts.create') }}" class="p-4 rounded-xl cursor-pointer bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group hover:bg-blue-200 dark:hover:bg-blue-800">
                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mb-3">
                            <x-svg.post-icon class="w-5 h-5 text-blue-600 dark:text-blue-400"/>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-blue-400">{{ __('Create Post') }}</span>
                    </a>

                    <a href="{{ route('podcasts.create') }}" class="p-4 rounded-xl cursor-pointer bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group hover:bg-yellow-200 dark:hover:bg-yellow-800">
                        <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center mb-3">
                            <x-svg.podcast-icon class="w-5 h-5 text-yellow-600 dark:text-yellow-400"/>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-yellow-400">{{ __('Create Podcast') }}</span>
                    </a>

                    <a href="{{ route('video.create') }}" class="p-4 rounded-xl cursor-pointer bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group hover:bg-red-200 dark:hover:bg-red-800">
                        <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center mb-3">
                            <x-svg.video-icon class="w-5 h-5 text-red-600 dark:text-red-400"/>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-red-400">{{ __('Create Video') }}</span>
                    </a>
                </div>

                {{-- Quick Links --}}
                <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
                    <h3 class="text-lg font-semibold mb-4 dark:text-white">{{ __('Quick Links') }}</h3>
                    <div class="space-y-3">
                        <a href="{{ route('student.favorites') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            <x-svg.heart-icon class="w-5 h-5 text-pink-500"/>
                            <span class="text-sm dark:text-white">{{ __('My Favorites') }}</span>
                        </a>
                        <a href="{{ route('student.comments') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            <x-svg.comments-icon class="w-5 h-5 text-green-500"/>
                            <span class="text-sm dark:text-white">{{ __('My Comments') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content Chart --}}
        <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold dark:text-white">{{ __('My Content') }}</h2>
            </div>
            <div class="aspect-video bg-gray-50 dark:bg-neutral-800 rounded-xl flex items-center justify-center">
                <canvas id="miContenido"></canvas>
            </div>
        </div>

    </div>

    <!-- My Content Chart -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const totales = @json($totals);

            const ctx = document.getElementById('miContenido').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [
                        '{{ __("Posts") }}',
                        '{{ __("Podcasts") }}',
                        '{{ __("Videos") }}',
                        '{{ __("Comments") }}',
                        '{{ __("Favorites") }}'
                    ],
                    datasets: [{
                        label: '{{ __("My Content") }}',
                        data: [totales.posts, totales.podcasts, totales.videos, totales.comentarios, totales.favoritos],
                        backgroundColor: ['#3b82f6', '#eab308', '#ef4444', '#10b981', '#ec4899'],
                        borderColor: ['#3b82f6', '#eab308', '#ef4444', '#10b981', '#ec4899'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw + ' {{ __("elements") }}';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

</x-layouts.app>

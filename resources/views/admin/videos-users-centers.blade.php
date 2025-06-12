<x-layouts.app :title="__('Center Videos')">
    <div class="p-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-10">{{ __('Videos from My Center') }}</h1>

        <div class="flex flex-col gap-8">
            @foreach ($videos as $video)
                <div class="bg-white dark:bg-neutral-900 rounded-2xl border border-gray-200 dark:border-neutral-700 shadow-sm hover:shadow-md transition-shadow p-6">
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Video Preview -->
                        <div class="md:w-1/3 w-full rounded-xl overflow-hidden border border-gray-200 dark:border-neutral-700 shadow-sm">
                            <video controls class="w-full h-48 object-cover">
                                <source src="{{ asset($video->video_path) }}" type="video/mp4">
                            </video>
                        </div>

                        <!-- Info -->
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <!-- Etiqueta tipo -->
                                <span class="inline-block mb-3 text-xs font-semibold text-blue-600 bg-blue-100 dark:bg-blue-800/40 dark:text-blue-300 px-3 py-1 rounded-full uppercase tracking-wide">
                                    {{ __('Video') }}
                                </span>

                                <!-- Título -->
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                                    <a href="{{ route('video.show', ['video' => $video->id]) }}" class="hover:underline">
                                        {{ $video->title }}
                                    </a>
                                </h2>

                                <!-- Descripción -->
                                <p class="text-gray-700 dark:text-gray-300 mb-4 line-clamp-3 leading-relaxed">
                                    {!! Str::limit(strip_tags($video->description), 200) !!}
                                </p>

                                <!-- Autor y centro -->
                                <div class="text-sm text-gray-500 dark:text-gray-400 space-y-1">
                                    <div><strong>{{ __('Author') }}:</strong> {{ $video->user->surname ?? __('Unknown') }}</div>
                                    <div><strong>{{ __('Center') }}:</strong> {{ $video->user->center->name ?? __('No center assigned') }}</div>
                                </div>
                            </div>

                            <!-- Botones -->
                            <div class="flex gap-3 mt-6">
                                <a href="{{ route('video.show', ['video' => $video->id]) }}"
                                   class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-sm transition">
                                    <x-svg.eye-icon class="w-4 h-4 mr-2" />
                                    {{ __('View') }}
                                </a>

                                <a href="{{ route('video.edit', $video->id) }}"
                                   class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                                    ✏️ {{ __('Edit') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-12">
            {{ $videos->links() }}
        </div>
    </div>
</x-layouts.app>

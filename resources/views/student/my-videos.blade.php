<x-layouts.app :title="__('Mis Videos')">
    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                <x-svg.video-icon class="w-8 h-8 inline-block mr-2 text-red-500"/>
                {{ __('Mis Videos') }}
            </h2>
            <div class="flex items-center gap-4">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $videos->total() }} {{ __('videos en total') }}
                </div>
                <a href="{{ route('video.create') }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors">
                    <x-svg.plus-icon class="w-4 h-4 mr-2"/>
                    {{ __('Crear Video') }}
                </a>
            </div>
        </div>

        @if($videos->count() > 0)
            <div class="grid gap-6">
                @foreach($videos as $video)
                    <div class="bg-white dark:bg-neutral-900 rounded-xl border shadow-lg p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-sm font-medium text-red-500 bg-red-100 dark:bg-red-900/30 px-2 py-1 rounded-full">
                                        {{ __('Video') }}
                                    </span>
                                    @if($video->tags && $video->tags->count() > 0)
                                        <div class="flex gap-1">
                                            @foreach($video->tags->take(3) as $tag)
                                                <span class="text-xs text-gray-500 bg-gray-100 dark:bg-gray-800 dark:text-gray-400 px-2 py-1 rounded-full">
                                                    {{ $tag->name }}
                                                </span>
                                            @endforeach
                                            @if($video->tags->count() > 3)
                                                <span class="text-xs text-gray-500 dark:text-gray-400">+{{ $video->tags->count() - 3 }}</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                    {{ $video->title }}
                                </h3>
                                
                                @if($video->description)
                                    <p class="text-gray-600 dark:text-gray-300 mb-3 line-clamp-2">
                                        {{ Str::limit($video->description, 200) }}
                                    </p>
                                @endif

                                <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                    <span>{{ __('Creado:') }} {{ $video->created_at ? $video->created_at->format('d/m/Y H:i') : 'Fecha no disponible' }}</span>
                                    @if($video->created_at != $video->updated_at)
                                        <span>{{ __('Actualizado:') }} {{ $video->updated_at ? $video->updated_at->diffForHumans() : 'Fecha no disponible' }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center gap-2 ml-4">
                                <a href="{{ route('video.show', $video->slug) }}" 
                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-red-100 hover:bg-red-200 dark:bg-red-900/30 dark:text-red-400 dark:hover:bg-red-900/50 rounded-lg transition-colors">
                                    <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                    {{ __('Ver') }}
                                </a>
                                <a href="{{ route('video.edit', $video->slug) }}" 
                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                    {{ __('Editar') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-6">
                {{ $videos->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <x-svg.video-icon class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4"/>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                    {{ __('No has creado videos aún') }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">
                    {{ __('Crea tu primer video para compartir contenido audiovisual con la comunidad.') }}
                </p>
                <a href="{{ route('video.create') }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors">
                    <x-svg.plus-icon class="w-4 h-4 mr-2"/>
                    {{ __('Crear mi primer Video') }}
                </a>
            </div>
        @endif
    </div>
</x-layouts.app>

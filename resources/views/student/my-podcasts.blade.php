<x-layouts.app :title="__('Mis Podcasts')">
    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                <x-svg.podcast-icon class="w-8 h-8 inline-block mr-2 text-yellow-500"/>
                {{ __('Mis Podcasts') }}
            </h2>
            <div class="flex items-center gap-4">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $podcasts->total() }} {{ __('podcasts en total') }}
                </div>
                <a href="{{ route('podcasts.create') }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg transition-colors">
                    <x-svg.plus-icon class="w-4 h-4 mr-2"/>
                    {{ __('Crear Podcast') }}
                </a>
            </div>
        </div>

        @if($podcasts->count() > 0)
            <div class="grid gap-6">
                @foreach($podcasts as $podcast)
                    <div class="bg-white dark:bg-neutral-900 rounded-xl border shadow-lg p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-sm font-medium text-yellow-500 bg-yellow-100 dark:bg-yellow-900/30 px-2 py-1 rounded-full">
                                        {{ __('Podcast') }}
                                    </span>
                                    @if($podcast->tags && $podcast->tags->count() > 0)
                                        <div class="flex gap-1">
                                            @foreach($podcast->tags->take(3) as $tag)
                                                <span class="text-xs text-gray-500 bg-gray-100 dark:bg-gray-800 dark:text-gray-400 px-2 py-1 rounded-full">
                                                    {{ $tag->name }}
                                                </span>
                                            @endforeach
                                            @if($podcast->tags->count() > 3)
                                                <span class="text-xs text-gray-500 dark:text-gray-400">+{{ $podcast->tags->count() - 3 }}</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                    {{ $podcast->title }}
                                </h3>
                                
                                @if($podcast->description)
                                    <p class="text-gray-600 dark:text-gray-300 mb-3 line-clamp-2">
                                        {{ Str::limit($podcast->description, 200) }}
                                    </p>
                                @endif

                                <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                    <span>{{ __('Creado:') }} {{ $podcast->created_at ? $podcast->created_at->format('d/m/Y H:i') : 'Fecha no disponible' }}</span>
                                    @if($podcast->created_at != $podcast->updated_at)
                                        <span>{{ __('Actualizado:') }} {{ $podcast->updated_at ? $podcast->updated_at->diffForHumans() : 'Fecha no disponible' }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center gap-2 ml-4">
                                <a href="{{ route('podcasts.show', $podcast->slug) }}" 
                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-600 bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-400 dark:hover:bg-yellow-900/50 rounded-lg transition-colors">
                                    <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                    {{ __('Ver') }}
                                </a>
                                <a href="{{ route('podcasts.edit', $podcast->slug) }}" 
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
                {{ $podcasts->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <x-svg.podcast-icon class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4"/>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                    {{ __('No has creado podcasts aún') }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">
                    {{ __('Crea tu primer podcast para compartir contenido de audio con la comunidad.') }}
                </p>
                <a href="{{ route('podcasts.create') }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg transition-colors">
                    <x-svg.plus-icon class="w-4 h-4 mr-2"/>
                    {{ __('Crear mi primer Podcast') }}
                </a>
            </div>
        @endif
    </div>
</x-layouts.app>

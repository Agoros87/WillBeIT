<x-layouts.app :title="__('Mis Posts')">
    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                <x-svg.post-icon class="w-8 h-8 inline-block mr-2 text-blue-500"/>
                {{ __('Mis Posts') }}
            </h2>
            <div class="flex items-center gap-4">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $posts->total() }} {{ __('posts en total') }}
                </div>
                <a href="{{ route('posts.create') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                    <x-svg.plus-icon class="w-4 h-4 mr-2"/>
                    {{ __('Crear Post') }}
                </a>
            </div>
        </div>

        @if($posts->count() > 0)
            <div class="grid gap-6">
                @foreach($posts as $post)
                    <div class="bg-white dark:bg-neutral-900 rounded-xl border shadow-lg p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-sm font-medium text-blue-500 bg-blue-100 dark:bg-blue-900/30 px-2 py-1 rounded-full">
                                        {{ __('Post') }}
                                    </span>
                                    @if($post->tags && $post->tags->count() > 0)
                                        <div class="flex gap-1">
                                            @foreach($post->tags->take(3) as $tag)
                                                <span class="text-xs text-gray-500 bg-gray-100 dark:bg-gray-800 dark:text-gray-400 px-2 py-1 rounded-full">
                                                    {{ $tag->name }}
                                                </span>
                                            @endforeach
                                            @if($post->tags->count() > 3)
                                                <span class="text-xs text-gray-500 dark:text-gray-400">+{{ $post->tags->count() - 3 }}</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                    {{ $post->title }}
                                </h3>

                                @if($post->description)
                                    <p class="text-gray-600 dark:text-gray-300 mb-3 line-clamp-2">
                                        {{ Str::limit($post->description, 200) }}
                                    </p>
                                @endif

                                <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                    <span>{{ __('Creado:') }} {{ $post->created_at ? $post->created_at->format('d/m/Y H:i') : 'Fecha no disponible' }}</span>
                                    @if($post->created_at != $post->updated_at)
                                        <span>{{ __('Actualizado:') }} {{ $post->updated_at ? $post->updated_at->diffForHumans() : 'Fecha no disponible' }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center gap-2 ml-4">
                                <a href="{{ route('posts.show', $post->slug) }}" 
                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900/30 dark:text-blue-400 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                                    <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                    {{ __('Ver') }}
                                </a>
                                <a href="{{ route('posts.edit', $post->slug) }}" 
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
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <x-svg.post-icon class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4"/>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                    {{ __('No has creado posts aún') }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">
                    {{ __('Crea tu primer post para compartir contenido con la comunidad.') }}
                </p>
                <a href="{{ route('posts.create') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                    <x-svg.plus-icon class="w-4 h-4 mr-2"/>
                    {{ __('Crear mi primer Post') }}
                </a>
            </div>
        @endif
    </div>
</x-layouts.app>

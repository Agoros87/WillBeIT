<x-layouts.app :title="__('Mis Comentarios')">
    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                <x-svg.comments-icon class="w-8 h-8 inline-block mr-2 text-green-500"/>
                {{ __('Mis Comentarios') }}
            </h2>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                {{ $comments->total() }} {{ __('comentarios en total') }}
            </div>
        </div>

        @if($comments->count() > 0)
            <div class="grid gap-6">
                @foreach($comments as $comment)
                    <div class="bg-white dark:bg-neutral-900 rounded-xl border shadow-lg p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <x-svg.post-icon class="w-6 h-6 text-blue-500"/>
                                    <span class="text-sm font-medium text-blue-500 bg-blue-100 dark:bg-blue-900/30 px-2 py-1 rounded-full">
                                        {{ __('Comentario en Post') }}
                                    </span>
                                </div>

                                <div class="mb-4">
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">
                                        {{ __('Mi comentario:') }}
                                    </h4>
                                    <div class="bg-gray-50 dark:bg-neutral-800 rounded-lg p-4">
                                        <p class="text-gray-900 dark:text-white">
                                            {{ $comment->content }}
                                        </p>
                                    </div>
                                </div>

                                @if($comment->post)
                                    <div class="mb-3">
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">
                                            {{ __('Comentado en:') }}
                                        </h4>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $comment->post->title ?? 'Sin título' }}
                                        </h3>
                                        
                                        @if(isset($comment->post->description))
                                            <p class="text-gray-600 dark:text-gray-300 mt-1 line-clamp-2">
                                                {{ Str::limit($comment->post->description, 100) }}
                                            </p>
                                        @endif
                                    </div>
                                @else
                                    <div class="text-gray-500 dark:text-gray-400 italic mb-3">
                                        {{ __('Post no disponible') }}
                                    </div>
                                @endif

                                <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                    <span>{{ __('Comentado:') }} {{ $comment->created_at ? $comment->created_at->diffForHumans() : 'Fecha no disponible' }}</span>
                                    @if($comment->created_at && $comment->updated_at && $comment->created_at != $comment->updated_at)
                                        <span>{{ __('Editado:') }} {{ $comment->updated_at->diffForHumans() }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center gap-2 ml-4">
                                @if($comment->post)
                                    <a href="{{ route('posts.show', $comment->post->slug) }}" 
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900/30 dark:text-blue-400 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                                        <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                        {{ __('Ver Post') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-6">
                {{ $comments->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <x-svg.comments-icon class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4"/>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                    {{ __('No has hecho comentarios aún') }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">
                    {{ __('Cuando comentes en posts, aparecerán aquí.') }}
                </p>
                <div class="flex justify-center">
                    <a href="{{ route('posts.index') }}" 
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900/30 dark:text-blue-400 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                        <x-svg.post-icon class="w-4 h-4 mr-2"/>
                        {{ __('Ver Posts') }}
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>

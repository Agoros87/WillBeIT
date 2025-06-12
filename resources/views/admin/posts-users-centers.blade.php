<x-layouts.app :title="__('Center Posts')">
    <div class="p-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">{{ __('Posts from My Center') }}</h1>

        <div class="flex flex-col gap-6">
            @foreach ($posts as $post)
                <div class="bg-white dark:bg-neutral-900 rounded-xl border shadow-lg p-6 hover:shadow-md transition-shadow flex items-start gap-6">
                    @if ($post->image)
                        <div class="mb-6 flex justify-center">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen del post" class="w-full max-w-lg rounded shadow">
                        </div>
                    @endif
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                    <span class="text-sm font-medium text-blue-500 bg-blue-100 dark:bg-blue-900/30 px-2 py-1 rounded-full">
                        {{ __('Post') }}
                    </span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                                {{ $post->title }}
                            </a>
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 mb-3 line-clamp-2">
                            {!! Str::limit(strip_tags($post->body), 150) !!}
                        </p>

                        <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                            <span>{{ __('Author') }}: {{ $post->user->name }} {{ $post->user->surname ?? __('Unknown') }}</span>
                            <span>{{ __('Center') }}: {{ $post->user->center->name ?? __('No center assigned') }}</span>
                        </div>
                    </div>

                    <a href="{{ route('posts.show', $post->slug) }}"
                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-600 bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-400 dark:hover:bg-yellow-900/50 rounded-lg transition-colors">
                        <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                        {{ __('View') }}
                    </a>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('posts.edit', $post->slug) }}"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 rounded-lg transition-colors">
                            {{ __('Edit') }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</x-layouts.app>

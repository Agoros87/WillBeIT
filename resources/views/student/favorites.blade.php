<x-layouts.app :title="__('My Favorites')">
    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                <x-svg.heart-icon class="w-8 h-8 inline-block mr-2 text-pink-500"/>
                {{ __('My Favorites') }}
            </h2>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                {{ $favorites->total() }} {{ __('favorites in total') }}
            </div>
        </div>

        @if($favorites->count() > 0)
            <div class="grid gap-6">
                @foreach($favorites as $favorite)
                    <div class="bg-white dark:bg-neutral-900 rounded-xl border shadow-lg p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    @if($favorite->favoritable_type === 'App\Models\Post')
                                        <x-svg.post-icon class="w-6 h-6 text-blue-500"/>
                                        <span class="text-sm font-medium text-blue-500 bg-blue-100 dark:bg-blue-900/30 px-2 py-1 rounded-full">
                                            {{ __('Post') }}
                                        </span>
                                    @elseif($favorite->favoritable_type === 'App\Models\Podcast')
                                        <x-svg.podcast-icon class="w-6 h-6 text-yellow-500"/>
                                        <span class="text-sm font-medium text-yellow-500 bg-yellow-100 dark:bg-yellow-900/30 px-2 py-1 rounded-full">
                                            {{ __('Podcast') }}
                                        </span>
                                    @elseif($favorite->favoritable_type === 'App\Models\Video')
                                        <x-svg.video-icon class="w-6 h-6 text-red-500"/>
                                        <span class="text-sm font-medium text-red-500 bg-red-100 dark:bg-red-900/30 px-2 py-1 rounded-full">
                                            {{ __('Video') }}
                                        </span>
                                    @endif
                                </div>

                                @if($favorite->favoritable)
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                        {{ $favorite->favoritable->title ?? $favorite->favoritable->name ?? 'Untitled' }}
                                    </h3>

                                    @if(isset($favorite->favoritable->description))
                                        <p class="text-gray-600 dark:text-gray-300 mb-3 line-clamp-2">
                                            {{ Str::limit($favorite->favoritable->description, 150) }}
                                        </p>
                                    @endif

                                    <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                        <span>{{ __('Added to favorites:') }} {{ $favorite->created_at ? $favorite->created_at->diffForHumans() : 'Date not available' }}</span>
                                        @if(isset($favorite->favoritable->created_at) && $favorite->favoritable->created_at)
                                            <span>{{ __('Created:') }} {{ $favorite->favoritable->created_at->format('d/m/Y') }}</span>
                                        @endif
                                    </div>
                                @else
                                    <div class="text-gray-500 dark:text-gray-400 italic">
                                        {{ __('Content not available') }}
                                    </div>
                                @endif
                            </div>

                            <div class="flex items-center gap-2 ml-4">
                                @if($favorite->favoritable)
                                    @if($favorite->favoritable_type === 'App\Models\Post')
                                        <a href="{{ route('posts.show', $favorite->favoritable->slug) }}"
                                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900/30 dark:text-blue-400 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                                            <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                            {{ __('View') }}
                                        </a>
                                    @elseif($favorite->favoritable_type === 'App\Models\Podcast')
                                        <a href="{{ route('podcasts.show', $favorite->favoritable->slug) }}"
                                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-600 bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-400 dark:hover:bg-yellow-900/50 rounded-lg transition-colors">
                                            <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                            {{ __('View') }}
                                        </a>
                                    @elseif($favorite->favoritable_type === 'App\Models\Video')
                                        <a href="{{ route('video.show', $favorite->favoritable->slug) }}"
                                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-red-100 hover:bg-red-200 dark:bg-red-900/30 dark:text-red-400 dark:hover:bg-red-900/50 rounded-lg transition-colors">
                                            <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                            {{ __('View') }}
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $favorites->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <x-svg.heart-icon class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4"/>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                    {{ __('You have no favorites yet') }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">
                    {{ __('When you add content to favorites, it will appear here.') }}
                </p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('posts.index') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900/30 dark:text-blue-400 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                        <x-svg.post-icon class="w-4 h-4 mr-2"/>
                        {{ __('View Posts') }}
                    </a>
                    <a href="{{ route('podcasts.index') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-600 bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-400 dark:hover:bg-yellow-900/50 rounded-lg transition-colors">
                        <x-svg.podcast-icon class="w-4 h-4 mr-2"/>
                        {{ __('View Podcasts') }}
                    </a>
                    <a href="{{ route('video.index') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-600 bg-red-100 hover:bg-red-200 dark:bg-red-900/30 dark:text-red-400 dark:hover:bg-red-900/50 rounded-lg transition-colors">
                        <x-svg.video-icon class="w-4 h-4 mr-2"/>
                        {{ __('View Videos') }}
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>

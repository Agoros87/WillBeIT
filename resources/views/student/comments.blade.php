<x-layouts.app :title="__('My Comments')">
    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                <x-svg.comments-icon class="w-8 h-8 inline-block mr-2 text-green-500"/>
                {{ __('My Comments') }}
            </h2>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                {{ $comments->total() }} {{ __('total comments') }}
            </div>
        </div>

        @if($comments->count() > 0)
            <div class="grid gap-6">
                @foreach($comments as $comment)
                    @php
                        $type = class_basename($comment->commentable_type);
                        $resource = $comment->commentable;
                    @endphp

                    <div class="bg-white dark:bg-neutral-900 rounded-xl border shadow-lg p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    @if($type === 'Post')
                                        <x-svg.post-icon class="w-6 h-6 text-blue-500"/>
                                        <span class="text-sm font-medium text-blue-500 bg-blue-100 dark:bg-blue-900/30 px-2 py-1 rounded-full">
                                            {{ __('Comment on Post') }}
                                        </span>
                                    @elseif($type === 'Podcast')
                                        <x-svg.podcast-icon class="w-6 h-6 text-yellow-500"/>
                                        <span class="text-sm font-medium text-yellow-500 bg-yellow-100 dark:bg-yellow-900/30 px-2 py-1 rounded-full">
                                            {{ __('Comment on Podcast') }}
                                        </span>
                                    @elseif($type === 'Video')
                                        <x-svg.video-icon class="w-6 h-6 text-red-500"/>
                                        <span class="text-sm font-medium text-red-500 bg-red-100 dark:bg-red-900/30 px-2 py-1 rounded-full">
                                            {{ __('Comment on Video') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="mb-4">
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">
                                        {{ __('My comment:') }}
                                    </h4>
                                    <div class="bg-gray-50 dark:bg-neutral-800 rounded-lg p-4">
                                        <p class="text-gray-900 dark:text-white">
                                            {{ $comment->content }}
                                        </p>
                                    </div>
                                </div>

                                @if($resource)
                                    <div class="mb-3">
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">
                                            {{ __('Commented on:') }}
                                        </h4>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $resource->title ?? $resource->name ?? 'Untitled' }}
                                        </h3>

                                        @if(isset($resource->description))
                                            <p class="text-gray-600 dark:text-gray-300 mt-1 line-clamp-2">
                                                {{ Str::limit($resource->description, 100) }}
                                            </p>
                                        @endif
                                    </div>
                                @else
                                    <div class="text-gray-500 dark:text-gray-400 italic mb-3">
                                        {{ __('Content not available') }}
                                    </div>
                                @endif

                                <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                    <span>{{ __('Commented:') }} {{ $comment->created_at?->diffForHumans() }}</span>
                                    @if($comment->created_at && $comment->updated_at && $comment->created_at != $comment->updated_at)
                                        <span>{{ __('Edited:') }} {{ $comment->updated_at->diffForHumans() }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center gap-2 ml-4">
                                @if($resource)
                                    @if($type === 'Post')
                                        <a href="{{ route('posts.show', $resource->slug) }}"
                                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900/30 dark:text-blue-400 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                                            <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                            {{ __('View Post') }}
                                        </a>
                                    @elseif($type === 'Podcast')
                                        <a href="{{ route('podcasts.show', $resource->slug) }}"
                                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-600 bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-400 dark:hover:bg-yellow-900/50 rounded-lg transition-colors">
                                            <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                            {{ __('View Podcast') }}
                                        </a>
                                    @elseif($type === 'Video')
                                        <a href="{{ route('video.show', $resource->id) }}"
                                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-red-100 hover:bg-red-200 dark:bg-red-900/30 dark:text-red-400 dark:hover:bg-red-900/50 rounded-lg transition-colors">
                                            <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                            {{ __('View Video') }}
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
                {{ $comments->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <x-svg.comments-icon class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4"/>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                    {{ __('You haven\'t commented yet') }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">
                    {{ __('When you comment on posts, podcasts or videos they will appear here.') }}
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

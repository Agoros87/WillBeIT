<x-layouts.app :title="__('My Podcasts')">
    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                <x-svg.podcast-icon class="w-8 h-8 inline-block mr-2 text-yellow-500"/>
                {{ __('My Podcasts') }}
            </h2>
            <div class="flex items-center gap-4">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $podcasts->total() }} {{ __('podcasts in total') }}
                </div>
                <a href="{{ route('podcasts.create') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg transition-colors">
                    <x-svg.plus-icon class="w-4 h-4 mr-2"/>
                    {{ __('Create Podcast') }}
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
                                    <span>{{ __('Created:') }} {{ $podcast->created_at ? $podcast->created_at->format('d/m/Y H:i') : 'Date not available' }}</span>
                                    @if($podcast->created_at != $podcast->updated_at)
                                        <span>{{ __('Updated:') }} {{ $podcast->updated_at ? $podcast->updated_at->diffForHumans() : 'Date not available' }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center gap-2 ml-4">
                                <a href="{{ route('podcasts.show', $podcast->slug) }}"
                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-600 bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-400 dark:hover:bg-yellow-900/50 rounded-lg transition-colors">
                                    <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                                    {{ __('View') }}
                                </a>
                                <a href="{{ route('podcasts.edit', $podcast->slug) }}"
                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                    {{ __('Edit') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $podcasts->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <x-svg.podcast-icon class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4"/>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                    {{ __("You haven't created any podcasts yet") }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">
                    {{ __('Create your first podcast to share audio content with the community.') }}
                </p>
                <a href="{{ route('podcasts.create') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg transition-colors">
                    <x-svg.plus-icon class="w-4 h-4 mr-2"/>
                    {{ __('Create My First Podcast') }}
                </a>
            </div>
        @endif
    </div>
</x-layouts.app>

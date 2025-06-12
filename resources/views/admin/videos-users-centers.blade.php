<x-layouts.app :title="__('Center Videos')">
    <div class="p-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">{{ __('Videos from My Center') }}</h1>

        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($videos as $video)
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow p-5 hover:shadow-lg transition duration-300 flex flex-col justify-between">
                    <div class="space-y-3">
                        <h3 class="text-xl font-semibold text-blue-600 dark:text-blue-400">
                            <a href="{{ route('video.show', ['video' => $video->id]) }}" class="hover:underline">
                                {{ $video->title }}
                            </a>
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 text-sm line-clamp-3">
                            {!! Str::limit(strip_tags($video->description), 150) !!}
                        </p>
                    </div>

                    <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                        <p>{{ __('Author') }}: {{ $video->user->name }} {{ $video->user->surname ?? __('Unknown') }}</p>
                        <p>{{ __('Center') }}: {{ $video->user->center->name ?? __('No center assigned') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $videos->links() }}
        </div>
    </div>
</x-layouts.app>

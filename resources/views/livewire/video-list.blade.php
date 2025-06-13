<div>
    @if($videos->isEmpty())
        <p class="text-gray-600">{{ __('No videos available.') }}</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($videos as $video)
                <div class="bg-white dark:bg-zinc-900 rounded shadow p-4 flex flex-col">
                    <h2 class="header-3 hover:underline mb-2">
                        <a href="{{ route('video.show', $video->id) }}">{{ $video->title }}</a>
                    </h2>
                    <div class="rounded overflow-hidden border border-gray-300 mb-2 h-48">
                        <video controls class="w-full h-full object-cover">
                            <source src="{{ asset($video->video_path) }}" type="video/mp4">
                        </video>
                    </div>
                    <p class="text-gray-700 dark:text-gray-200 mb-2">{{ Str::limit($video->description, 100) }}</p>
                    <div class="mt-4 text-sm text-gray-500">
                        {{ __('Tags') }}: {{ $video->tags->pluck('name')->join(', ') }}
                    </div>
                    <div class="mt-4 text-sm text-gray-500">
                        <p>{{ __('Author') }}
                            : {{ $video->user->name }} {{ $video->user->surname ?? 'Desconocido' }}</p>
                    </div>
                    <p class="text-sm text-gray-500 mt-auto">{{ __('Uploaded') }}
                        : {{ $video->created_at->format('d/m/Y') }}</p>
                    <div class="flex gap-2 mt-2">
                        @can('update', $video)
                            <a href="{{ route('video.edit', $video->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                {{ __('Edit') }}
                            </a>
                        @endcan

                        @can('delete', $video)
                            <form action="{{ route('video.destroy', $video->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este video?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $videos->links() }}
        </div>
    @endif
</div>
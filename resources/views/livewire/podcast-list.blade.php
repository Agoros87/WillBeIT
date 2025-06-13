<div>
    @if($podcasts->isEmpty())
        <p class="text-gray-600">No podcasts available.</p>
    @else
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($podcasts as $podcast)
                <div class="bg-white dark:bg-zinc-900 dark:text-gray-200 rounded-xl shadow-md p-4 hover:shadow-lg transition duration-300 flex flex-col justify-between">
                    <div class="space-y-2">
                        <h2 class=" header-3 hover:underline">
                            <a href="{{ route('podcasts.show', $podcast) }}">{{ $podcast->title }}</a>
                        </h2>
                        @if($podcast->image_path)
                            <img src="{{ asset('storage/' . $podcast->image_path) }}" alt="Podcast image" class="w-full h-40 object-cover rounded-md mt-2">
                        @endif

                        <div class="mt-4 text-sm text-gray-500">
                            {{ __('Tags') }}: {{ $podcast->tags->pluck('name')->join(', ') }}
                        </div>
                        <div class="mt-4 text-sm text-gray-500">
                            <p>{{ __('Author') }}
                                : {{ $podcast->user->name }} {{ $podcast->user->surname ?? 'Desconocido' }}</p>
                        </div>
                        <div class="mt-4 text-sm text-gray-500">
                            <p>{{ __('Uploaded') }}: {{ $podcast->user->created_at ?? 'Desconocido' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-4 text-sm">
                        @can('update', $podcast)
                            <a href="{{ route('podcasts.edit', $podcast) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                {{ __('Edit') }}
                            </a>
                        @endcan

                        @can('delete', $podcast)
                            <form action="{{ route('podcasts.destroy', $podcast) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this podcast?') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $podcasts->links() }}
        </div>
    @endif
</div>

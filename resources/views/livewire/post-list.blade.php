<div>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition duration-300 flex flex-col justify-between">
                <div class="space-y-2">
                    <h3 class="header-3 text-lg font-semibold text-blue-600">
                        <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                            {{ $post->title }}
                        </a>

                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="w-full h-40 object-cover rounded-md mt-2">
                        @endif
                    </h3>
                    <div class="text-gray-700 text-sm max-h-24 overflow-hidden prose max-w-none">
                        {!! Str::limit(strip_tags($post->body), 150) !!}
                    </div>
                </div>
                <div class="mt-4 text-sm text-gray-500">
                    {{ __('Tags') }}: {{ $post->tags->pluck('name')->join(', ') }}
                </div>
                <div class="mt-4 text-sm text-gray-500">
                    <p>{{ __('Author') }}: {{ $post->user->name }} {{ $post->user->surname ?? 'Desconocido' }}</p>
                </div>
                <div class="mt-4 text-sm text-gray-500">
                    <p>{{ __('Uploaded') }}:{{ $post->user->created_at ?? 'Desconocido' }}</p>
                </div>
                <div class="flex items-center justify-between mt-4 text-sm">
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            {{ __('Edit') }}
                        </a>
                    @endcan

                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this podcast?') }}');">
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
    <div class="p-6">
        {{ $posts->links() }}
    </div>
</div>

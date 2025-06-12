<div>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
{{--        @dd($posts)--}}
        @foreach ($posts as $post)
            <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition duration-300 flex flex-col justify-between">
                <div class="space-y-2">
                    <h3 class="header-3 text-lg font-semibold text-blue-600">
                        <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <div class="text-gray-700 text-sm max-h-24 overflow-hidden prose max-w-none">
                        {!! Str::limit(strip_tags($post->body), 150) !!}
                    </div>
                </div>
                <div class="mt-4 text-sm text-gray-500">
                    {{ __('Tags') }}: {{ $post->tags->pluck('name')->join(', ') }}
                </div>
                <div class="mt-4 text-sm text-gray-500">
                    {{ __('Author') }}: {{ $post->user->name }} {{ $post->user->surname ?? 'Desconocido' }}
                </div>
                <div class="mt-3 flex items-center justify-between text-sm text-blue-600">
                    <a href="{{ route('posts.show', $post) }}" class="hover:underline">{{ __('View') }}</a>
                    @role('superadmin')
                    <div class="flex items-center gap-3">
                        <a href="{{ route('posts.edit', $post) }}" class="text-green-600 hover:underline">{{ __('Edit') }}</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('{{ __('Delete this post?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">{{ __('Delete') }}</button>
                        </form>
                    </div>
                    @endrole
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-6">
        {{ $posts->links() }}
    </div>
</div>

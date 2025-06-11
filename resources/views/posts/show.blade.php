<x-public-layout title="{{__('Posts')}}">
    <div class="max-w-2xl mx-auto bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 mt-8">

        <h1 class="text-3xl font-bold mb-4 text-blue-700">{{ $post->title }}</h1>

        @if ($post->image)
            <div class="mb-6 flex justify-center">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen del post" class="w-full max-w-lg rounded shadow">
            </div>
        @endif

        @livewire('favorite-button', ['model' => $post])

        <div class="text-gray-700 mb-4 prose max-w-none dark:text-gray-200">{!! $post->body !!}</div>

        <p class="text-sm text-gray-500 mb-2">
            {{__("Author")}}: {{ $post->user->name ?? 'Desconocido'}} {{ $post->user->surname ?? 'Desconocido' }}
        </p>

        @if ($post->video_id)
            <div class="mb-6 flex justify-center">
                <video controls class="w-full max-w-md rounded border border-gray-300">
                    <source src="{{ asset($post->video->video_path) }}" type="video/mp4">
                    {{ __("Your browser does not support the video reproduction.") }}
                </video>
            </div>
        @endif

        @if ($post->podcasts_id)
            <div class="mb-6 flex justify-center">
                <audio controls class="w-full max-w-md">
                    <source src="{{ asset('storage/' . $post->podcast->podcast_path) }}" type="audio/mpeg">
                    {{ __("Your browser does not support the audio tag.") }}
                </audio>
            </div>
        @endif

        <div class="flex items-center justify-between mb-4">
            <p class="text-base dark:text-white">
                {{ $post->likedByUsers()->count() }} {{ Str::plural('Like', $post->likedByUsers()->count()) }}
            </p>
            @auth
                <form action="{{ route('posts.like', $post) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded dark:text-white transition duration-300 ">
                        {{ $post->isLikedBy(auth()->user()) ? __("Unlike") : __("Like") }}
                    </button>
                </form>
            @endauth
        </div>

        @canany(['update', 'delete'], $post)
            <div class="flex gap-4 mb-4">
                @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">{{__("Edit")}}</a>
                @endcan
                @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm({{__('Delete this post?')}})">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                            {{__("Delete")}}
                        </button>
                    </form>
                @endcan
            </div>
        @endcanany

        <div class="mt-8 flex justify-center">
            <a href="{{ route('posts.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                {{ __("Back") }}
            </a>
        </div>

        @auth
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ __("Leave a comment") }}</h3>
                <form action="{{ route('comments.store') }}" method="POST" class="space-y-2">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea name="content" rows="4" required class="w-full p-3 border rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                        {{ __("Comment") }}
                    </button>
                </form>
            </div>
        @endauth

        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-4 dark:text-white">{{ __("Commentary") }}</h3>
            @if($post->comments->where('parent_id', null)->isEmpty())
                <p class="text-sm text-gray-500">{{ __("No Comments Yet") }}</p>
            @else
                <div class="space-y-3">
                    @foreach($post->comments->where('parent_id', null) as $comment)
                        <div class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg shadow-md max-w-lg">
                            @include('components.comment', ['comment' => $comment])
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-public-layout>

<x-public-layout title="{{ __('Post details') }}">
    <div class="min-h-screen w-full bg-white dark:bg-neutral-900 p-6 flex flex-col">
        <h1 class="header-1 py-4">{{ __('Post details') }}</h1>
        <div class="w-full max-w-7xl mx-auto bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-8">

            <div class="flex justify-between items-center mb-6">
                @livewire('favorite-button', ['model' => $post])
                <a href="{{ route('posts.index') }}"
                   class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 transition text-sm font-medium">
                    {{ __('Back') }}
                </a>
            </div>
            <h3 class="header-2 text-center mb-10">{{ $post->title }}</h3>
            @if ($post->image)
                <div class="mb-6 flex justify-center">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ __('Post image') }}"
                         class="w-full max-w-4xl rounded shadow">
                </div>
            @endif

            <div class="text-gray-700 mb-4 prose max-w-none dark:text-gray-200">{!! $post->body !!}</div>


            @if ($post->video_id)
                <div class="mb-6 flex justify-center">
                    <video controls class="w-full max-w-3xl rounded border border-gray-300">
                        <source src="{{ asset($post->video->video_path) }}" type="video/mp4">
                        {{ __("Your browser does not support the video reproduction.") }}
                    </video>
                </div>
            @endif

            @if ($post->podcasts_id)
                <div class="mb-6 flex justify-center">
                    <audio controls class="w-full max-w-3xl">
                        <source src="{{ asset('storage/' . $post->podcast->podcast_path) }}" type="audio/mpeg">
                        {{ __("Your browser does not support the audio tag.") }}
                    </audio>
                </div>
            @endif

            <div class="flex justify-between items-start mb-4">
                <div></div> <!-- Espacio vacío para mantener estructura -->

                <div class="flex flex-col items-end space-y-2">
                    @auth
                        <form action="{{ route('posts.like', $post) }}" method="POST">
                            @csrf
                            <button
                                type="submit"
                                class="w-40 px-4 py-2 rounded bg-purple-500 hover:bg-purple-600 text-white transition duration-300 shadow-md text-center"
                            >
                                {{ $post->isLikedBy(auth()->user()) ? '👎 Quitar Like' : '👍 Like' }}
                            </button>
                        </form>
                    @endauth

                    <p
                        class="w-40 text-base border border-purple-300 px-4 py-2 rounded shadow-sm bg-purple-100 text-purple-800 dark:bg-purple-800 dark:text-white dark:border-purple-600 text-center"
                    >
                        👍 {{ $post->likedByUsers()->count() }} {{ Str::plural('Like', $post->likedByUsers()->count()) }}
                    </p>
                </div>
            </div>


        @canany(['update', 'delete'], $post)
                <div class="flex gap-4 mb-4">
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post) }}"
                           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">
                            {{ __("Edit") }}
                        </a>
                    @endcan
                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                              onsubmit="return confirm('{{ __('Delete this post?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                {{ __("Delete") }}
                            </button>
                        </form>
                    @endcan

                </div>
            @endcanany
            <p class="text-sm text-gray-500 mb-2">
                {{ __('Uploaded') }}: {{ $post->created_at->format('d/m/Y') }}
            </p>
            <p class="text-sm text-gray-500 mb-4">
                {{ __('By') }}: {{ $post->user->name }}
            </p>
        </div>
        @auth
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ __("Leave a comment") }}</h3>
                <form action="{{ route('comments.store') }}" method="POST" class="space-y-2">
                    @csrf

                    <input type="hidden" name="commentable_id" value="{{ $post->id }}">
                    <input type="hidden" name="commentable_type" value="{{ get_class($post) }}">

                    <textarea name="content" rows="4" required
                              class="w-full p-3 border rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                        {{ __("Comment") }}
                    </button>
                </form>
            </div>
        @endauth

        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-4 dark:text-white">{{ __("Commentary") }}</h3>

            @php
                $comments = $post->comments->where('parent_id', null);
            @endphp

            @if($comments->isEmpty())
                <p class="text-sm text-gray-500">{{ __("No Comments Yet") }}</p>
            @else
                <div class="space-y-3">
                    @foreach($comments as $comment)
                        <div class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg shadow-md w-full max-w-4xl relative">
                            @include('components.comment', ['comment' => $comment, 'model' => $post])

                            @auth
                                <div class="mt-2 flex space-x-2">
                                    @can('update', $comment)
                                        <a href="{{ route('comments.edit', $comment) }}"
                                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                            {{ __("Edit") }}
                                        </a>
                                    @endcan

                                    @can('delete', $comment)
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                              onsubmit="return confirm('{{ __('Are you sure you want to delete this comment?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                {{ __("Delete") }}
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            @endauth
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-public-layout>

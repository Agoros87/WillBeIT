<x-public-layout title="{{ __('Podcasts details') }}">
    <div class="min-h-screen w-full bg-white dark:bg-neutral-900 p-8 flex flex-col justify-center">
        <h1 class="header-1 py-4">{{ __('Podcasts details') }}</h1>
        <div class="w-full max-w-7xl bg-white dark:bg-neutral-900 border border-gray-200 dark:border-gray-700 rounded-xl p-8 shadow space-y-6">

            <div class="flex justify-between items-center mb-6">
                @livewire('favorite-button', ['model' => $podcast])
                <a href="{{ route('podcasts.index') }}"
                   class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 transition text-sm font-medium">
                    {{ __('Back') }}
                </a>
            </div>
            <div>
                <h2 class="header-2 text-center mb-10">{{ $podcast->title }}</h2>

                @if ($podcast->image_path)
                    <div class="my-6 flex justify-center">
                        <img src="{{ asset('storage/' . $podcast->image_path) }}" alt="{{ $podcast->title }}"
                             class="w-full max-w-3xl rounded-lg shadow-md">
                    </div>
                @endif

                <p class="text-gray-700 my-4 dark:text-gray-300">{{ $podcast->description }}</p>

                @if ($podcast->podcast_path)
                    <div class="my-6">
                        <audio controls class="w-full rounded border border-gray-300">
                            <source src="{{ asset('storage/' . $podcast->podcast_path) }}" type="audio/mpeg">
                            {{ __('Your browser does not support the audio element.') }}
                        </audio>
                    </div>
                @endif
            </div>

            @auth
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ __("Leave a comment") }}</h3>
                    <form action="{{ route('comments.store') }}" method="POST" class="space-y-2">
                        @csrf

                        <input type="hidden" name="commentable_id" value="{{ $podcast->id }}">
                        <input type="hidden" name="commentable_type" value="{{ get_class($podcast) }}">

                        <textarea name="content" rows="4" required
                                  class="w-full p-3 border rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white"></textarea>

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
                    $comments = $podcast->comments->where('parent_id', null);
                @endphp

                @if ($comments->isEmpty())
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __("No Comments Yet") }}</p>
                @else
                    <div class="space-y-3 max-w-full">
                        @foreach ($comments as $comment)
                            <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow-md w-full relative max-w-4xl mx-auto">
                                @include('components.comment', ['comment' => $comment, 'model' => $podcast])

                                @auth
                                    <div class="mt-2 flex space-x-2">
                                        @can('update', $comment)
                                            <a href="{{ route('comments.edit', $comment) }}"
                                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                Editar
                                            </a>
                                        @endcan

                                        @can('delete', $comment)
                                            <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar este comentario?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                    Eliminar
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

    </div>
</x-public-layout>

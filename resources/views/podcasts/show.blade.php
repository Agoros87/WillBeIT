<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $podcast->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900 p-8">

<h1 class="text-3xl font-bold mb-4">{{ $podcast->title }}</h1>

<p class="text-gray-700 mb-6">{{ $podcast->description }}</p>

@if($podcast->image_path)
    <div class="mb-6">
        <img src="{{ asset('storage/' . $podcast->image_path) }}" alt="{{ $podcast->title }}" class="w-full max-w-sm mx-auto rounded-lg">
    </div>
@endif

@if($podcast->podcast_path)
    <div class="mb-6">
        <audio controls class="w-full">
            <source src="{{ asset('storage/' . $podcast->podcast_path) }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
@endif

@livewire('favorite-button', ['model' => $podcast])

<a href="{{ route('podcasts.index') }}" class="text-blue-600 hover:underline mt-4 block">← Back to list</a>

@livewireScripts


@auth
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ __("Leave a comment") }}</h3>
        <form action="{{ route('comments.store') }}" method="POST" class="space-y-2">
            @csrf

            {{-- Campos polimórficos para cualquier modelo --}}
            <input type="hidden" name="commentable_id" value="{{ $podcast->id }}">
            <input type="hidden" name="commentable_type" value="{{ get_class($podcast) }}">

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
        $comments = $podcast->comments->where('parent_id', null);
    @endphp

    @if($comments->isEmpty())
        <p class="text-sm text-gray-500">{{ __("No Comments Yet") }}</p>
    @else
        <div class="space-y-3">
            @foreach($comments as $comment)
                <div class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg shadow-md max-w-lg relative">
                    @include('components.comment', ['comment' => $comment, 'model' => $podcast])

                    {{-- Botones para editar o eliminar --}}
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
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 p-8">

<h1 class="text-2xl font-bold mb-6">{{ $post->title }}</h1>

@if ($post->image)
    <div class="mb-6">
        <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen del post" class="w-full max-w-lg rounded shadow">
    </div>
@endif

<p class="text-gray-700 mb-4">{{ $post->body }}</p>

<p class="text-sm text-gray-500 mb-2">Autor: {{ $post->user->name ?? 'Desconocido' }}</p>
<p class="text-sm text-gray-500 mb-2">Slug: {{ $post->slug }}</p>
<p class="text-sm text-gray-500 mb-2">Video ID: {{ $post->video_id }}</p>
<p class="text-sm text-gray-500 mb-6">Podcast ID: {{ $post->podcasts_id }}</p>
@role('super-admin')
<div class="flex gap-4">
    <a href="{{ route('posts.edit', $post) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Editar</a>

    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Eliminar este post?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Eliminar
        </button>
    </form>
</div>
@endrole

{{-- Botón para volver al índice de posts --}}

<!-- Botón para volver al índice de posts -->
<div class="mt-4">
    <a href="{{ route('posts.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Volver a la lista de posts
    </a>
</div>

{{-- Formulario para agregar un comentario --}}
@auth
    <div class="mt-6">
        <h3 class="text-base font-semibold text-gray-900 dark:text-white">Deja tu comentario</h3>
        <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <textarea name="content" rows="4" required class="w-full p-3 border rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

            <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                Comentar
            </button>
        </form>
    </div>
@endauth

{{-- Lista de comentarios --}}
<div class="mt-6">
    <h3 class="text-base font-semibold text-gray-900 dark:text-white">Comentarios</h3>

    @if($post->comments->where('parent_id', null)->isEmpty())
        <p class="mt-3 text-sm text-gray-500">No hay comentarios aún. Sé el primero en comentar.</p>
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

</body>
</html>

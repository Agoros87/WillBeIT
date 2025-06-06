<x-public-layout title="__('Posts')">

<h1 class="header-1">{{ $post->title }}</h1>

@if ($post->image)
    <div class="mb-6">
        <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen del post" class="w-full max-w-lg rounded shadow">
    </div>
@endif
@livewire('favorite-button', ['model' => $post])
<div class="text-gray-700 mb-4 prose max-w-none">{!! $post->body !!}</div>

<p class="text-sm text-gray-500 mb-2">{{__("Author")}}: {{ $post->user->name ?? 'Desconocido'}} {{ $post->user->surname ?? 'Desconocido' }}</p>
    @if ($post->video_id)
        <div class="mb-6">
            <video controls class="w-full rounded border border-gray-300">
                <source src="{{ asset($post->video->video_path) }}" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
    @endif

    @if ($post->podcasts_id)
        <div class="mb-6">
            <audio controls class="w-full max-w-xl">
                <source src="{{ asset('storage/' . $post->podcast->podcast_path) }}" type="audio/mpeg">
                Tu navegador no soporta el tag de audio.
            </audio>
        </div>
    @endif
<p>{{ $post->likedByUsers()->count() }} {{ Str::plural('Like', $post->likedByUsers()->count()) }}</p>

@auth
    <form action="{{ route('posts.like', $post) }}" method="POST">
        @csrf
        <button type="submit" class="px-3 py-1 rounded bg-{{ $post->isLikedBy(auth()->user()) ? 'red' : 'gray' }}-600 text-white">
            {{ $post->isLikedBy(auth()->user()) ? 'Quitar Like' : 'Dar Like' }}
        </button>
    </form>
@endauth

    @can('update', $post)
<div class="flex gap-4">
    <a href="{{ route('posts.edit', $post) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Editar</a>
    @endcan
    @can('destroy', $post)
    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Eliminar este post?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Eliminar
        </button>
    </form>
    @endcan
</div>

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
                {{__("Comment")}}
            </button>
        </form>
    </div>
@endauth

{{-- Lista de comentarios --}}
<div class="mt-6">
    <h3 class="header-3">{{__("Commentary")}}</h3>

    @if($post->comments->where('parent_id', null)->isEmpty())
        <p class="mt-3 text-sm text-gray-500">{{__("No Comments Yet")}}</p>
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
</x-public-layout>

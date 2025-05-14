<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('partials.navigation')

<h1 class="text-2xl font-bold mb-6">Listado de Posts</h1>

        @role('superadmin')
            <div class="flex justify-end gap-4">
                <a href="{{ route('superadmin.dashboard') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Volver al Dashboard
                </a>
                <a href="{{ route('posts.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Crear nuevo post
                </a>
            </div>
        @endrole

@foreach ($posts as $post)
    <div class="bg-white rounded shadow p-4 mb-4">
        <h3 class="text-xl font-semibold">{{ $post->title }}</h3>
        <p class="text-gray-700 mb-2">{{ $post->body }}</p>
        <p class="text-sm text-gray-500">Autor: {{ $post->user->name}} {{ $post->user->surname ?? 'Desconocido' }}</p>

        <div class="mt-2 flex gap-4">
            <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">Ver</a>

            @role('superadmin')
            <a href="{{ route('posts.edit', $post) }}" class="text-green-600 hover:underline">Editar</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Eliminar este post?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
            </form>
            @endrole

        </div>
    </div>
@endforeach

</body>
</html>

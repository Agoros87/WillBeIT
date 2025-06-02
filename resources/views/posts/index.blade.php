<x-public-layout title="Posts">
    <h1 class="header-1">Listado de Posts</h1>
    <div class="flex justify-end gap-4">
        @role('superadmin')
        <a href="{{ route('superadmin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            Volver al Dashboard
        </a>
        @endrole

        @can('create' , App\Models\Post::class)
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                Crear nuevo post
            </a>
        @endcan
    </div>


@foreach ($posts as $post)
        <div class="bg-white rounded shadow p-4 mb-4">
            <h3 class="header-3">
                <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">
                    {{ $post->title }}
                </a>
            </h3>
            <p class="text-gray-700 mb-2">{{ $post->body }}</p>
            <p class="text-sm text-gray-500">
                Autor: {{ $post->user->name}} {{ $post->user->surname ?? 'Desconocido' }}</p>
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
</x-public-layout>

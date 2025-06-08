<x-public-layout title="{{__('Posts')}}">
    <h1 class="header-1">{{__('Post List')}}</h1>
    <div class="flex justify-end gap-4">
        @hasrole('superadmin')
        <div class="flex justify-end gap-4 mb-6">
            <a href="{{ route('superadmin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('Return to dashboard') }}
            </a>
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('New post') }}
            </a>
        </div>
        @elsehasrole('admin')
        <div class="flex justify-end gap-4 mb-6">
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('Return to dashboard') }}
            </a>
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('New post') }}
            </a>
        </div>
        @endhasrole
    </div>


@foreach ($posts as $post)
        <div class="bg-white rounded shadow p-4 mb-4">
            <h3 class="header-3">
                <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">
                    {{ $post->title }}
                </a>
            </h3>
            <div class="text-gray-700 mb-2 prose max-w-none">
                {!! Str::limit(strip_tags($post->body), 150) !!}
            </div>
            <p class="text-sm text-gray-500">
                {{__("Author")}}: {{ $post->user->name}} {{ $post->user->surname ?? 'Desconocido' }}</p>
            <div class="mt-2 flex gap-4">
                <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">Ver</a>
                @role('superadmin')
                <a href="{{ route('posts.edit', $post) }}" class="text-green-600 hover:underline">Editar</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Eliminar este post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">{{__('Delete')}}</button>
                </form>
                @endrole
            </div>
        </div>
    @endforeach
</x-public-layout>

<x-public-layout title="{{__('Posts')}}">
    <div class="flex justify-between items-center bg-white dark:bg-zinc-900 shadow-md border-t dark:border-gray-400">
        <h1 class="header-1 px-4 min-w-max">{{__('Post List')}}</h1>
        <livewire:tag-filter/>
    </div>
    @auth
        <div class="flex justify-end gap-4 p-4">
            @php $role = auth()->user()->roles()->first()->name.'.' @endphp
            <a href="{{ route($role.'dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('Return to dashboard') }}
            </a>
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition flex items-center gap-2">
                <x-svg.plus-icon class="w-5"/>
                {{ __('New post') }}
            </a>
        </div>
    @endauth
    <section class="p-4">
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
    </section>
</x-public-layout>

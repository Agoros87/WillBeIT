<x-public-layout title="{{ __('Posts') }}">
    <div class="p-8">
    <h1 class="header-1">{{ __('Post List') }}</h1>

    <div class="flex justify-end gap-4 mb-6">
        @hasrole('superadmin')
        <a href="{{ route('superadmin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            {{ __('Return to dashboard') }}
        </a>
        @elsehasrole('admin')
        <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            {{ __('Return to dashboard') }}
        </a>
        @elsehasrole('teacher')
        <a href="{{ route('teacher.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            {{ __('Return to dashboard') }}
        </a>
        @elsehasrole('student')
        <a href="{{ route('student.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            {{ __('Return to dashboard') }}
        </a>
        @endhasrole

        @can('create', App\Models\Post::class)
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('New post') }}
            </a>
        @endcan
    </div>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition duration-300 flex flex-col justify-between">
                <div class="space-y-2">
                    <h3 class="header-3 text-lg font-semibold text-blue-600">
                        <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <div class="text-gray-700 text-sm max-h-24 overflow-hidden prose max-w-none">
                        {!! Str::limit(strip_tags($post->body), 150) !!}
                    </div>
                </div>

                <div class="mt-4 text-sm text-gray-500">
                    {{ __('Author') }}: {{ $post->user->name }} {{ $post->user->surname ?? 'Desconocido' }}
                </div>


                <div class="flex items-center justify-between mt-4 text-sm">
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            {{ __('Edit') }}
                        </a>
                    @endcan

                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this podcast?') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    @endcan
                </div>

                <div class="mt-3 flex items-center justify-between text-sm text-blue-600">
                    <a href="{{ route('posts.show', $post) }}" class="hover:underline">{{ __('View') }}</a>

                    @role('superadmin')
                    <div class="flex items-center gap-3">
                        <a href="{{ route('posts.edit', $post) }}" class="text-green-600 hover:underline">{{ __('Edit') }}</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('{{ __('Delete this post?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">{{ __('Delete') }}</button>
                        </form>
                    </div>
                    @endrole
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-6">
        {{ $posts->links() }}
    </div>
    </div>
</x-public-layout>

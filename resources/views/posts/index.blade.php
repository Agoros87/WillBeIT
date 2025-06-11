<x-public-layout title="{{ __('Posts') }}">
    <div class="flex justify-between items-center bg-white dark:bg-zinc-900 shadow-md border-t dark:border-gray-400">
        <h1 class="header-1 px-4 min-w-max">{{__('Post List')}}</h1>
        <livewire:tag-filter/>
    </div>
    <div class="p-8">
        @auth
            <div class="flex justify-end gap-4 mb-6">
                @php $role = auth()->user()->roles()->first()->name.'.' @endphp
                <a href="{{ route($role.'dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('Return to dashboard') }}
                </a>
                @can('create', App\Models\Post::class)
                    <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        {{ __('New post') }}
                    </a>
                @endcan
            </div>
        @endauth
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

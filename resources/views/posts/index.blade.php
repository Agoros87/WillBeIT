<x-public-layout title="{{ __('Posts') }}">
    <div class="flex justify-between items-center bg-white dark:bg-zinc-900 shadow-md border-t dark:border-gray-400">
        <h1 class="header-1 px-4 min-w-max">{{__('Post List')}}</h1>
        <x-tag-filter/>
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
        <livewire:post-list/>
    </div>
</x-public-layout>

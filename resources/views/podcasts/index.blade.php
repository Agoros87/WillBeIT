<x-public-layout title="Podcasts">
    <div class="flex justify-between items-center bg-white dark:bg-zinc-900 shadow-md border-t dark:border-gray-400">
        <h1 class="header-1 px-4 min-w-max">{{__("Podcasts")}}</h1>
        <x-tag-filter/>
    </div>
    <div class="p-8">
        <div class="flex justify-end gap-4 mb-6">
            @auth
                @php $role = auth()->user()->roles->first()->name.'.' @endphp
                <a href="{{ route($role.'dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('Return to dashboard') }}
                </a>
            @endauth

            @can('create', App\Models\Podcast::class)
                <a href="{{ route('podcasts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('New podcast') }}
                </a>
            @endcan
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded shadow mb-6 alert-success">
                {{ session('success') }}
            </div>
        @endif
        <livewire:podcast-list/>
    </div>
</x-public-layout>

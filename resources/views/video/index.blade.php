<x-public-layout title="{{__('Videos')}}">
    <div class="flex justify-between items-center bg-white dark:bg-zinc-900 shadow-md border-t dark:border-gray-400">
        <h1 class="header-1 px-4 min-w-max">{{ __('Videos') }}</h1>
        <x-tag-filter/>
    </div>
    <div class="p-8">
        <div class="flex justify-end gap-4 mb-6">
            @auth
                @php $role = auth()->user()->roles()->first()->name.'.' @endphp
                <a href="{{ route($role.'dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('Return to dashboard') }}
                </a>
            @endauth
            @can('create', App\Models\Video::class)
                <a href="{{ route('video.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('New video') }}
                </a>
            @endcan
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded shadow mb-6 alert-success">
                {{ session('success') }}
            </div>
        @endif
        <livewire:video-list/>
    </div>
    <script>
        setTimeout(() => {
            const alert = document.querySelector('.alert-success');
            if (alert) {
                alert.classList.add('opacity-0');
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
</x-public-layout>

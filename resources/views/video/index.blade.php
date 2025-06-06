<x-public-layout title="Videos">
    <div class="p-8">
        <h1 class="header-1">{{ __('Videos') }}</h1>

        @role('superadmin')
        <div class="flex justify-end gap-4 mb-6">
            <a href="{{ route('superadmin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('Return to dashboard') }}
            </a>
            <a href="{{ route('video.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('New video') }}
            </a>
        </div>
        @endrole

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded shadow mb-6 alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($videos->isEmpty())
            <p class="text-gray-600">{{ __('No videos available.') }}</p>
        @else
            <div class="space-y-4">
                @foreach($videos as $video)
                    <div class="border p-4 rounded shadow bg-white">
                        <h2 class="text-xl font-semibold text-blue-600 hover:underline">
                            <a href="{{ route('video.show', $video->id) }}">{{ $video->title }}</a>
                        </h2>
                        <p class="text-gray-700 mb-2">{{ Str::limit($video->description, 100) }}</p>
                        <div class="aspect-video rounded overflow-hidden border border-gray-300 my-2">
                            <video controls class="w-full h-full object-cover">
                                <source src="{{ asset($video->video_path) }}" type="video/mp4">
                            </video>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">{{ __('Uploaded') }}: {{ $video->created_at->format('d/m/Y') }}</p>

                        @role('superadmin')
                        <div class="flex space-x-2 mt-2">
                            <a href="{{ route('video.edit', $video->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                {{ __('Edit') }}
                            </a>

                            <form action="{{ route('video.destroy', $video->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este video?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
                        @endrole
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $videos->links() }}
            </div>
        @endif
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

<x-public-layout title="Detalle del Video">
    <div class="p-8 max-w-4xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="header-1">Detalle del Video</h1>
            <a href="{{ route('video.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 transition text-sm font-medium">
                Volver
            </a>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow space-y-6">
            @livewire('favorite-button', ['model' => $video])

            <div>
                <h2 class="text-2xl font-semibold text-blue-700">{{ $video->title }}</h2>
                <div class="my-4">
                    <video controls class="w-full rounded border border-gray-300">
                        <source src="{{ asset($video->video_path) }}" type="video/mp4">
                        Tu navegador no soporta la reproducción de videos.
                    </video>
                </div>
                <p class="text-sm text-gray-500 mb-2">Subido el: {{ $video->created_at->format('d/m/Y') }}</p>
                <p class="text-sm text-gray-500 mb-4">Por: {{ $video->user->name }}</p>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Descripción</h3>
                <p class="text-gray-700">{{ $video->description }}</p>
            </div>
        </div>

    </div>
</x-public-layout>

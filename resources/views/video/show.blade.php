<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle del Video</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

@include('partials.navigation')

<div class="max-w-3xl mx-auto px-4 py-10">
    <div class="mb-8 flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Detalle del Video</h1>
        <a href="{{ route('video.index') }}"
           class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
            Volver
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
        @livewire('favorite-button', ['model' => $video])
        <div class="space-y-4">
            <div>
                <h2 class="text-xl font-semibold">{{ $video->title }}</h2>
                <video controls width="100%" class="rounded-lg">
                    <source src="{{ asset($video->video_path) }}" type="video/mp4">
                    Tu navegador no soporta la reproducción de videos.
                </video>
            </div>
            <div>
                <p class="text-sm text-gray-600 mt-4">{{ $video->description }}</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>

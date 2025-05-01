<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Video</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

@include('partials.navigation')

<div class="max-w-3xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-semibold mb-6">Editar video</h1>

    <form action="{{ route('video.update', $video->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium">Título</label>
            <input type="text" name="title" id="title" value="{{ $video->title }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring focus:ring-gray-200">
            @error('title')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium">Descripción</label>
            <textarea name="description" id="description"
                      class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring focus:ring-gray-200"
                      rows="4">{{ $video->description }}</textarea>
            @error('description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Video actual</label>
            <video controls class="mt-2 w-full max-w-sm rounded-md shadow">
                <source src="{{ asset($video->video_path) }}" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
        </div>

        <div>
            <label for="video_path" class="block text-sm font-medium">Nuevo video (opcional)</label>

            <label for="video_path" class="mt-2 inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md shadow cursor-pointer hover:bg-gray-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Seleccionar archivo
            </label>

            <input type="file" name="video_path" id="video_path" accept="video/*" class="hidden">
        </div>

        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('video.index') }}"
               class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-100 transition text-sm font-medium">
                Volver
            </a>
            <button type="submit"
                    class="px-6 py-2 bg-black text-white rounded-md hover:bg-gray-800 transition text-sm font-medium">
                Actualizar
            </button>
        </div>
    </form>
</div>

</body>
</html>

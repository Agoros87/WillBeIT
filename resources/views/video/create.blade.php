<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Video</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
    <h1 class="text-2xl font-bold mb-6">Subir un nuevo video</h1>
    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-5">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título del video</label>
            <input
                type="text"
                id="title"
                name="title"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Ingresa un título llamativo"
                value="{{ old('title') }}"
                required
            >
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
            <textarea
                id="description"
                name="description"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Describe brevemente el contenido"
                required
            >{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="video_path" class="block text-sm font-medium text-gray-700 mb-1">Archivo de video</label>
            <input
                type="file"
                id="video_path"
                name="video_path"
                class="w-full border border-gray-300 rounded-md p-2 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                accept="video/mp4,video/quicktime"
                required
            >
            @error('video_path')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center space-x-3">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                Subir Video
            </button>
            <a href="{{ route('video.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                Volver
            </a>
        </div>
    </form>
</div>
</body>
</html>

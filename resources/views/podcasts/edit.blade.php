<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Podcast</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 p-8">

<h1 class="text-2xl font-bold mb-6">Editar podcast</h1>

<form action="{{ route('podcasts.update', $podcast) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label for="title" class="block font-semibold">Título</label>
        <input type="text" name="title" id="title" value="{{ old('title', $podcast->title) }}"
               class="w-full border border-gray-300 p-2 rounded" required>
        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block font-semibold">Descripción</label>
        <textarea name="description" id="description" rows="5"
                  class="w-full border border-gray-300 p-2 rounded" required>{{ old('description', $podcast->description) }}</textarea>
        @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="audio_file" class="block font-semibold">Archivo de audio</label>
        <input type="file" name="audio_file" id="audio_file"
               class="w-full border border-gray-300 p-2 rounded">
        @error('audio_file')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        @if($podcast->podcast_path)
            <p class="text-gray-700 mt-2">Archivo actual: <a href="{{ asset('storage/' . $podcast->podcast_path) }}" class="text-blue-600 hover:underline" target="_blank">Escuchar</a></p>
        @endif
    </div>

    <div>
        <label for="image" class="block font-semibold">Imagen (opcional)</label>
        <input type="file" name="image" id="image"
               class="w-full border border-gray-300 p-2 rounded">
        @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        @if($podcast->image_path)
            <p class="text-gray-700 mt-2">Imagen actual: <img src="{{ asset('storage/' . $podcast->image_path) }}" alt="Imagen del podcast" class="w-32 h-32 object-cover mt-2"></p>
        @endif
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Actualizar
    </button>

    <a href="{{ route('podcasts.index') }}" class="text-gray-700 hover:underline ml-4">Cancelar</a>
</form>

</body>
</html>

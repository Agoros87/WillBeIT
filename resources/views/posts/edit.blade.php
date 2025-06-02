<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 p-8">

<h1 class="header-1">Editar post</h1>

<form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label for="title" class="block font-semibold">Título</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="w-full border p-2 rounded" required>
        @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="body" class="block font-semibold">Contenido</label>
        <textarea name="body" id="body" rows="4" class="w-full border p-2 rounded" required>{{ old('body', $post->body) }}</textarea>
        @error('body') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="image" class="block font-semibold">Imagen (opcional)</label>
        <input type="file" name="image" id="image" class="w-full border p-2 rounded">
        @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="video_id" class="block font-semibold">Video</label>
        <select name="video_id" id="video_id" class="w-full border p-2 rounded" required>
            @foreach ($videos as $video)
                <option value="{{ $video->id }}" {{ old('video_id', $post->video_id) == $video->id ? 'selected' : '' }}>
                    {{ $video->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="podcasts_id" class="block font-semibold">Podcast</label>
        <select name="podcasts_id" id="podcasts_id" class="w-full border p-2 rounded" required>
            @foreach ($podcasts as $podcast)
                <option value="{{ $podcast->id }}" {{ old('podcasts_id', $post->podcasts_id) == $podcast->id ? 'selected' : '' }}>
                    {{ $podcast->title }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Actualizar
    </button>

    <a href="{{ route('posts.index') }}" class="text-gray-700 hover:underline ml-4">Cancelar</a>
</form>

</body>
</html>

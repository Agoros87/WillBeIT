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

<form action="{{ route('podcasts.update', $podcast) }}" method="POST" class="space-y-4">
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

    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
        Actualizar
    </button>

    <a href="{{ route('podcasts.index') }}" class="text-gray-700 hover:underline ml-4">Cancelar</a>
</form>

</body>
</html>


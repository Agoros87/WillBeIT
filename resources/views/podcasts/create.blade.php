<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Podcast</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 p-8">

<h1 class="text-2xl font-bold mb-6">Create New Podcast</h1>

<form action="{{ route('podcasts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label for="title" class="block font-semibold">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}"
               class="w-full border border-gray-300 p-2 rounded" required>
        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block font-semibold">Description</label>
        <textarea name="description" id="description" rows="5"
                  class="w-full border border-gray-300 p-2 rounded" required>{{ old('description') }}</textarea>
        @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="audio_file" class="block font-semibold">Audio File</label>
        <input type="file" name="audio_file" id="audio_file"
               class="w-full border border-gray-300 p-2 rounded" required>
        @error('audio_file')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image" class="block font-semibold">Image (optional)</label>
        <input type="file" name="image" id="image"
               class="w-full border border-gray-300 p-2 rounded">
        @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Create
    </button>

    <a href="{{ route('podcasts.index') }}" class="text-gray-700 hover:underline ml-4">Cancel</a>
</form>

</body>
</html>

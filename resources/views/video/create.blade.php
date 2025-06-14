<x-public-layout title="Subir Video">
    <div class="p-8 max-w-3xl mx-auto bg-white dark:bg-zinc-900 text-gray-700 dark:text-gray-200 rounded-xl shadow mt-10">

        <h1 class="header-1 mb-6">Subir un nuevo video</h1>

        <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label for="title" class="block text-sm font-medium mb-1">{{ __('Title') }}</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 dark:bg-zinc-800 focus:ring-blue-500 focus:outline-none"
                    placeholder="Ingresa un título llamativo"
                    value="{{ old('title') }}"
                    required
                >
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="description" class="block text-sm font-medium mb-1">{{ __('Description') }}</label>
                <textarea
                    id="description"
                    name="description"
                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 dark:bg-zinc-800 focus:ring-blue-500 focus:outline-none"
                    placeholder="Describe brevemente el contenido"
                    required
                >{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="tags" class="block text-sm font-medium mb-1">{{ __('Tags') }}</label>
                <select name="tags[]" id="tags" multiple class="w-full border border-gray-300 rounded-md p-2 bg-white dark:bg-zinc-800 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                @endforeach
            </div>

            <div class="mb-5">
                <label for="video_path" class="block text-sm font-medium text-gray-700 mb-1">Archivo de video</label>
                <input
                    type="file"
                    id="video_path"
                    name="video_path"
                    class="w-full border border-gray-300 rounded-md p-2 bg-white dark:bg-zinc-800 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    accept="video/mp4,video/quicktime"
                    required
                >
                @error('video_path')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                {{-- Contenedor para previsualización --}}
                <div id="preview" class="mt-4 hidden">
                    <p class="text-sm text-gray-600 mb-2">Vista previa:</p>
                    <video id="previewVideo" controls class="w-full max-w-md rounded-md shadow"></video>
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('video.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                    Volver
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition cursor-pointer">
                    Subir Video
                </button>
            </div>
        </form>
    </div>

    <script>
        const input = document.getElementById('video_path');
        const previewContainer = document.getElementById('preview');
        const previewVideo = document.getElementById('previewVideo');

        input.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const videoURL = URL.createObjectURL(file);
                previewVideo.src = videoURL;
                previewContainer.classList.remove('hidden');
            } else {
                previewVideo.src = '';
                previewContainer.classList.add('hidden');
            }
        });
    </script>
</x-public-layout>

<x-public-layout title="Editar Video">
    <div class="p-8 max-w-3xl mx-auto bg-white rounded-xl shadow mt-10">
        <h1 class="header-1 mb-6">Editar video</h1>

        <form action="{{ route('video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título del video</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ $video->title }}"
                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
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
                    rows="4"
                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >{{ $video->description }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Video actual -->
            <div id="current-video-container" class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">Video actual</label>
                <video controls class="w-full max-w-md rounded-md shadow">
                    <source src="{{ asset($video->video_path) }}" type="video/mp4">
                    Tu navegador no soporta la reproducción de video.
                </video>
            </div>

            <!-- Vista previa del nuevo video -->
            <div id="new-video-preview-container" class="mb-5 hidden">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nuevo video seleccionado</label>
                <p class="text-sm text-blue-600 mb-1">⚠️ El video actual será reemplazado por este:</p>
                <video id="new-video-preview" controls class="w-full max-w-md rounded-md shadow"></video>
            </div>

            <div class="mb-5">
                <label for="video_path" class="block text-sm font-medium text-gray-700 mb-1">Nuevo archivo de video (opcional)</label>
                <input
                    type="file"
                    id="video_path"
                    name="video_path"
                    class="w-full border border-gray-300 rounded-md p-2 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    accept="video/*"
                >
                @error('video_path')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('video.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                    Volver
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Actualizar
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const videoInput = document.getElementById('video_path');
            const newVideoPreview = document.getElementById('new-video-preview');
            const newVideoContainer = document.getElementById('new-video-preview-container');
            const currentVideoContainer = document.getElementById('current-video-container');

            videoInput.addEventListener('change', function (e) {
                const file = this.files[0];

                if (file) {
                    // Liberar URL previa si existe
                    if (newVideoPreview.src) {
                        URL.revokeObjectURL(newVideoPreview.src);
                    }

                    // Verificar que sea video
                    if (file.type.startsWith('video/')) {
                        const videoURL = URL.createObjectURL(file);
                        newVideoPreview.src = videoURL;
                        newVideoContainer.classList.remove('hidden');
                        currentVideoContainer.classList.add('hidden');
                    } else {
                        alert('Por favor, selecciona un archivo de video válido.');
                        this.value = '';
                    }
                }
            });

            document.querySelector('form').addEventListener('submit', function () {
                if (newVideoPreview.src && newVideoPreview.src.startsWith('blob:')) {
                    URL.revokeObjectURL(newVideoPreview.src);
                }
            });
        });
    </script>
</x-public-layout>

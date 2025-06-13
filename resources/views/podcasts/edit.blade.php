<x-public-layout title="{{ __('Edit Podcast') }}">
    <div class="p-8 max-w-3xl mx-auto bg-white rounded-xl shadow mt-10">
        <h1 class="header-1 mb-6">Editar podcast</h1>

        <form action="{{ route('podcasts.update', $podcast) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $podcast->title) }}"
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
                >{{ old('description', $podcast->description) }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <p>{{ __('Tags').': '. $podcast->tags->pluck('name')->join(', ') }}</p>
                <label for="tags" class="block mb-1 font-semibold text-gray-700"></label>
                <select name="tags[]" id="tags" multiple
                        class="w-full border border-gray-300 rounded-md p-2 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', $podcast->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Audio actual -->
            @if($podcast->podcast_path)
                <div id="current-audio-container" class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Audio actual</label>
                    <audio controls class="w-full max-w-md">
                        <source src="{{ asset('storage/' . $podcast->podcast_path) }}" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                </div>
            @endif

            <!-- Vista previa del nuevo audio -->
            <div id="new-audio-preview-container" class="mb-5 hidden">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nuevo audio seleccionado</label>
                <p class="text-sm text-blue-600 mb-1">⚠️ El audio actual será reemplazado por este:</p>
                <audio id="new-audio-preview" controls class="w-full max-w-md"></audio>
            </div>

            <div class="mb-5">
                <label for="audio_file" class="block text-sm font-medium text-gray-700 mb-1">Nuevo archivo de audio (opcional)</label>
                <input
                    type="file"
                    id="audio_file"
                    name="audio_file"
                    class="w-full border border-gray-300 rounded-md p-2 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    accept="audio/*"
                >
                @error('audio_file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Imagen actual -->
            @if($podcast->image_path)
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Imagen actual</label>
                    <img src="{{ asset('storage/' . $podcast->image_path) }}" alt="Imagen del podcast" class="w-32 h-32 object-cover rounded shadow">
                </div>
            @endif

            <div class="mb-5">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Nueva imagen (opcional)</label>
                <input
                    type="file"
                    id="image"
                    name="image"
                    class="w-full border border-gray-300 rounded-md p-2 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    accept="image/*"
                >
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('podcasts.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-public-layout>

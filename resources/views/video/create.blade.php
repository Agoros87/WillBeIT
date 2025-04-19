<form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Título del video --}}
    <div>
        <label for="title">Título del video</label>
        <input
            type="text"
            id="title"
            name="title"
            placeholder="Ingresa un título llamativo"
            value="{{ old('title') }}"
            required
        >
        @error('title')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    {{-- Descripción del video --}}
    <div>
        <label for="description">Descripción</label>
        <textarea
            id="description"
            name="description"
            placeholder="Describe brevemente el contenido"
        >{{ old('description') }}</textarea>
        @error('description')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    {{-- Archivo de video --}}
    <div>
        <label for="video_path">Archivo de video</label>
        <input
            type="file"
            id="video_path"
            name="video_path"
            accept="video/mp4,video/quicktime"
            required
        >
        @error('video_path')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    {{-- Botón para enviar --}}
    <div>
        <button type="submit">Subir Video</button>
    </div>
</form>

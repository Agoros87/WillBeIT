<form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
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

    <div class="mb-3">
        <label for="description">Descripción</label>
        <textarea
            id="description"
            name="description"
            placeholder="Describe brevemente el contenido"
            required
        >
            {{ old('description') }}
        </textarea>
        @error('description')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
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

    <button type="submit" class="btn btn-primary">Subir Video</button>
    <br>
    <button><a href="{{ route('video.index') }}" class="btn btn-secondary">Volver</a></button>

</form>

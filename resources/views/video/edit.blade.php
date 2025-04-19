    <div class="container">
        <h1>Editar Video</h1>
        <form action="{{ route('video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Título</label>
                <input type="text" name="title" class="form-control" value="{{ $video->title }}" required>
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="description" class="form-control">{{ $video->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Video actual:</label>
                <video controls width="200">
                    <source src="{{ asset($video->video_path) }}" type="video/mp4">
                </video>
            </div>

            <div class="mb-3">
                <label>Nuevo video (opcional)</label>
                <input type="file" name="video_path" class="form-control" accept="video/*">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

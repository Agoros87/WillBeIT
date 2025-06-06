<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Edit tag') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">{{ __('Edit tag') }}</h1>
    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @error('name')
        <span class="alert alert-danger py-1 px-2 d-inline-block mb-2" role="alert">{{ $message }}</span>
        @enderror
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Tag name') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $tag->name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
    </form>
</div>
</body>
</html>

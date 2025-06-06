
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Create new tag') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-b-red-700 text-red-600 px-4 py-3 rounded-lg">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1 class="mb-4">{{ __('Create new tag') }}</h1>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Tag name') }}</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Write the tag name') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
    </form>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $podcast->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900 p-8">

<h1 class="text-3xl font-bold mb-4">{{ $podcast->title }}</h1>

<p class="text-gray-700 mb-6">{{ $podcast->description }}</p>

@if($podcast->image_path)
    <div class="mb-6">
        <img src="{{ asset('storage/' . $podcast->image_path) }}" alt="{{ $podcast->title }}" class="w-full max-w-sm mx-auto rounded-lg">
    </div>
@endif

@if($podcast->podcast_path)
    <div class="mb-6">
        <audio controls class="w-full">
            <source src="{{ asset('storage/' . $podcast->podcast_path) }}" type="audio/mpeg">
            Tu navegador no soporta el elemento de audio.
        </audio>
    </div>
@endif

@livewire('favorite-button', ['model' => $podcast])

<a href="{{ route('podcasts.index') }}" class="text-blue-600 hover:underline mt-4 block">← Volver al listado</a>

@livewireScripts
</body>
</html>

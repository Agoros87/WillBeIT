<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $podcast->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 p-8">

<h1 class="text-3xl font-bold mb-4">{{ $podcast->title }}</h1>

<p class="text-gray-700 mb-6">{{ $podcast->description }}</p>

<a href="{{ route('podcasts.index') }}" class="text-blue-600 hover:underline">← Volver al listado</a>

</body>
</html>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle de Usuario</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

@include('partials.navigation')

<div class="max-w-3xl mx-auto px-4 py-10">
    <div class="mb-8 flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Detalle del Usuario</h1>
        <a href="{{ route('users.index') }}"
           class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
            Volver
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
        <div class="space-y-4">
            <div>
                <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                <p class="text-sm text-gray-500">Centro: {{ $user->center->name ?? 'N/A' }}</p>
                <p class="text-sm text-gray-400 mt-1">
                    Rol: <span class="font-medium text-gray-600">
                        {{ $user->getRoleNames()->isNotEmpty() ? $user->getRoleNames()->implode(', ') : 'student' }}
                    </span>
                </p>
                <p class="text-xs text-gray-400 mt-1">Creado: {{ $user->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">ID Usuario: <span class="font-medium">{{ $user->id }}</span></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>


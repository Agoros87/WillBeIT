<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

@include('partials.navigation')

<div class="max-w-3xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-semibold mb-6">Crear nuevo usuario</h1>

    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring focus:ring-gray-200"
                   required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium">Correo electrónico</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring focus:ring-gray-200"
                   required>
        </div>

        <div>
            <label for="type" class="block text-sm font-medium">Tipo (opcional)</label>
            <input type="text" name="type" id="type" value="{{ old('type') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring focus:ring-gray-200">
        </div>

        <div>
            <label for="center_id" class="block text-sm font-medium">Centro</label>
            <select name="center_id" id="center_id" required
                    class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring focus:ring-gray-200">
                <option value="">Selecciona un centro</option>
                @foreach($centers as $center)
                    <option value="{{ $center->id }}" {{ old('center_id') == $center->id ? 'selected' : '' }}>
                        {{ $center->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="roles" class="block text-sm font-medium">Rol</label>
            <select name="roles[]" id="roles" multiple
                    class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring focus:ring-gray-200">
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" {{ collect(old('roles'))->contains($role->name) ? 'selected' : '' }}>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium">Contraseña</label>
            <input type="password" name="password" id="password"
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring focus:ring-gray-200"
                   required>
        </div>

        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('users.index') }}"
               class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-100 transition text-sm font-medium">
                Cancelar
            </a>
            <button type="submit"
                    class="px-6 py-2 bg-black text-white rounded-md hover:bg-gray-800 transition text-sm font-medium">
                Crear Usuario
            </button>
        </div>
    </form>
</div>

</body>
</html>

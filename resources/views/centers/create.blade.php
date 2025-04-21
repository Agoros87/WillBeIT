<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centers</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
@include('partials.navigation')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-6">Crear nuevo Centro</h1>
    <form action="{{ route('centers.store') }}" method="POST" class="space-y-4">
        @csrf
        <fieldset class="border p-6 rounded shadow-md bg-white">
            <legend class="font-semibold text-xl p-4">Datos del Centro</legend>
            <x-input label="Nombre del Centro" name="name"/>
            <x-input label="Dirección del Centro" name="address"/>
            <x-input label="Ciudad" name="city"/>
            <x-input label="Provincia" name="province"/>
            <x-input label="Código Postal" name="postal_code"/>
            <x-input label="Email del centro" name="email" type="email"/>
            <x-input label="Teléfono del Centro" name="phone"/>
        </fieldset>
        <fieldset class="border p-6 rounded shadow-md bg-white">
            <legend class="font-semibold text-xl p-4">Datos del Director y Coordinador</legend>
            <x-input label="Nombre del Director" name="director_name"/>
            <x-input label="Email del Director" name="director_email" type="email"/>
            <x-input label="Coordinador de Erasmus" name="erasmus_coordinator"/>
        </fieldset>
        <div class="p-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Crear
            </button>
            <a href="{{ route('centers.index') }}" class="text-gray-700 hover:underline ml-4">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>


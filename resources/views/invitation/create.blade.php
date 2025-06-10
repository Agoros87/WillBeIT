<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ __("Enviar Invitación a alumno") }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 p-8">

<h1 class="header-1">{{ __("Send Invitation to a user") }}</h1>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('invitations.send') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label for="email" class="block font-semibold">{{ __("Email del invitado") }}</label>
        <input type="email" name="email" id="email"
               class="w-full border p-2 rounded" required />
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        {{ __("Enviar Invitación") }}
    </button>

    <a href="{{ route('home') }}" class="text-gray-700 hover:underline ml-4">{{ __("Cancelar") }}</a>
</form>

</body>
</html>

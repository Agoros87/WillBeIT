<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
    <!-- Estilos y Scripts base -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Estilos adicionales -->
    @stack('styles')
</head>
<body class="bg-gray-100 dark:bg-zinc-800">
@include('partials.navigation')
<div class="flex min-h-screen relative">
    <!-- Sidebar -->
    @auth
        <aside id="sidebar" class="absolute md:static z-10 py-4 min-h-full left-0 bg-white dark:bg-zinc-900 overflow-x-hidden ease-in-out transition-[width,padding,min-width] duration-300 shadow-2xl">
            <x-roles-sidebar/>
            @section('sidebar')@show
        </aside>
    @endauth
    @guest
        @hasSection('sidebar')
            <aside id="sidebar" class="absolute md:static z-10 py-4 min-h-full left-0 bg-white dark:bg-zinc-900 overflow-x-hidden ease-in-out transition-[width,padding,min-width] duration-300 shadow-2xl">
                @yield('sidebar')
            </aside>
        @endif
    @endguest

    <!-- Contenido Principal -->
    <main class="w-full h-full">
        {{ $slot }}
    </main>
</div>
<!-- Scripts adicionales -->
@stack('scripts')
</body>
</html>

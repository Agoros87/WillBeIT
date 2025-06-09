<x-public-layout :title="__('Invitación rechazada')">
    <section class="flex flex-col gap-8 py-8 px-2 md:px-8 items-center">
        <h1 class="header-1 text-center">{{ __('Tu solicitud ha sido rechazada') }}</h1>
        <p class="text-lg text-center max-w-xl">
            {{ __('Tu cuenta ha sido rechazada por un administrador. Si crees que es un error, ponte en contacto con tu profesor o con el centro educativo.') }}
        </p>
        <a href="{{ route('home') }}" class="mt-6 px-6 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold transition">
            {{ __('Cancelar') }}
        </a>
    </section>
</x-public-layout>

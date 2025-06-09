<x-public-layout :title="__('Invitation pending')">
    <section class="flex flex-col gap-8 py-8 px-2 md:px-8 items-center">
        <h1 class="header-1 text-center">{{ __('Your request are pending of approved') }}</h1>
        <p class="text-lg text-center max-w-xl">
            {{ __('Your account not has been accepted yet by the administrator.') }}
        </p>
        <a href="{{ route('home') }}" class="mt-6 px-6 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold transition">
            {{ __('Cancel') }}
        </a>
    </section>
</x-public-layout>

<x-public-layout :title="__('Create Center')">
    <div class="p-8">
        <h1 class="header-1">{{__('Create new Center')}}</h1>
        <form action="{{ route('centers.store') }}" method="POST" class="space-y-4 px-2 md:px-4 lg:px-8">
            @csrf
            <section class="flex flex-col md:flex-row gap-4 w-full *:flex-1">
                <fieldset class="p-6 rounded-lg shadow-md bg-white dark:bg-zinc-900 lg:*:flex *:gap-2 *:justify-between">
                    <legend class="header-2 p-4">{{__('Center Data')}}</legend>
                    <x-input label="Nombre del Centro:" name="name"/>
                    <x-input label="Dirección del Centro:" name="address"/>
                    <x-input label="Ciudad:" name="city"/>
                    <x-input label="Provincia:" name="province"/>
                    <x-input label="Código Postal:" name="postal_code"/>
                    <x-input label="Email del centro:" name="email" type="email"/>
                    <x-input label="Teléfono del Centro:" name="phone"/>
                </fieldset>
                <fieldset class="p-6 rounded-lg shadow-md bg-white dark:bg-zinc-900 lg:*:flex *:gap-2 *:justify-between">
                    <legend class="header-2 p-4">{{ __('Director and Coordinator data') }}</legend>
                    <x-input label="Nombre del Director:" name="director_name"/>
                    <x-input label="Email del Director:" name="director_email" type="email"/>
                    <x-input label="Coordinador de Erasmus:" name="erasmus_coordinator"/>
                </fieldset>
            </section>
            <div class="p-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    {{ __('Create') }}
                </button>
                <a href="{{ route('centers.index') }}" class="text-gray-700 hover:underline ml-4">{{__('Cancel')}}</a>
            </div>
        </form>
    </div>
</x-public-layout>>


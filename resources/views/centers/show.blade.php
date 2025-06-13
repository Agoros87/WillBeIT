<x-public-layout :title="__('Center')">
    <div class="p-8">
        <h1 class="header-1">{{ $center->name }}</h1>
        <section class="flex flex-col md:flex-row gap-4 w-full *:flex-1">
            <fieldset class="p-6 rounded-lg shadow-md bg-white dark:bg-zinc-900 lg:*:flex *:gap-2 *:justify-between">
                <legend class="header-2 p-4">{{ __('Center Data') }}</legend>
                <x-input :disabled="true" :value="$center->name" label="Nombre del Centro:" name="name"/>
                <x-input :disabled="true" :value="$center->address" label="Dirección del Centro:" name="address"/>
                <x-input :disabled="true" :value="$center->city" label="Ciudad:" name="city"/>
                <x-input :disabled="true" :value="$center->province" label="Provincia:" name="province"/>
                <x-input :disabled="true" :value="$center->postal_code" label="Código Postal:" name="postal_code"/>
                <x-input :disabled="true" :value="$center->email" label="Email del centro:" name="email" type="email"/>
                <x-input :disabled="true" :value="$center->phone" label="Teléfono del Centro:" name="phone"/>
            </fieldset>
            <fieldset class="p-6 rounded-lg shadow-md bg-white dark:bg-zinc-900 lg:*:flex *:gap-2 *:justify-between">
                <legend class="header-2 p-4">{{__('Director and Coordinator data')}}</legend>
                <x-input :disabled="true" :value="$center->director_name" label="Nombre del Director:" name="director_name"/>
                <x-input :disabled="true" :value="$center->director_email" label="Email del Director:" name="director_email" type="email"/>
                <x-input :disabled="true" :value="$center->erasmus_coordinator" label="Coordinador de Erasmus:" name="erasmus_coordinator"/>
            </fieldset>
        </section>
    </div>
</x-public-layout>


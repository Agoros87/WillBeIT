<x-public-layout :title="__('Home')">
    <section class="flex flex-col gap-8 py-8 px-2 md:px-8">
        <h1 class="header-1">{{ __('Centers') }}</h1>
        <div class="flex gap-3">
            @php $role = auth()->user()->roles?->first()?->name.'.' @endphp
            <a href="{{ route($role.'dashboard') }}" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition text-sm font-medium">
                {{ __('Dashboard') }} </a>
            @hasrole('superadmin')
            <a href="{{ route('centers.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-800 transition text-sm font-medium flex gap-2 items-center">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke="currentColor" stroke-linecap="round" class="w-4 h-4">
                    <path d="M12 2V22M2 12H22"/>
                </svg>
                {{ __('Create Center') }} </a>
            @endhasrole
        </div>
        @foreach($centers as $center)
            <article class="reveal-scroll flex flex-col md:flex-row *:relative rounded-2xl w-fit">
                <a href="{{ route('centers.show', $center) }}" class="center-image">
                    <h3 class="header-3 flex gap-2">
                        <img src="{{ $center->logo ? asset($center->logo) : asset('svg/center.svg') }}" alt="{{ Str::slug($center->name) }}-logo" class="text-xs w-5 md:w-7 bg-gray-300 dark:bg-gray-600 rounded">
                        {{ $center->name }}</h3>
                    <img src="{{ $center->image ? asset($center->image) : asset('svg/center.svg') }}" alt="{{ Str::slug($center->name) }}-image">
                </a>
                <x-center-data :center="$center" class="center-data polygon"/>
            </article>
            <div class="flex gap-2 items-center justify-center w-max">
                <a href="{{ route('centers.edit', $center) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                    Editar </a>
                <form action="{{ route('centers.destroy', $center) }}" method="POST" onsubmit="confirm('¿Estás seguro de eliminar este centro?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                        Eliminar
                    </button>
                </form>
            </div>
        @endforeach
    </section>
</x-public-layout>
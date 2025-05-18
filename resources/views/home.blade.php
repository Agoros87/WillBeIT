<x-public-layout :title="__('Home')">
    <section class="flex flex-col gap-8 p-8">
        <h1 class="text-5xl font-semibold text-blue-600 dark:text-emerald-500 drop-shadow drop-shadow-blue-300 dark:drop-shadow-emerald-700">{{ __('Centers') }}</h1>
        @foreach($centers as $center)
            <article class="reveal-scroll flex *:relative rounded-2xl shadow-lg w-fit">
                <div class="center-image">
                    <h3 class="text-xl flex gap-2">
                        <img src="{{ $center->logo ? asset($center->logo) : asset('svg/center.svg') }}" alt="{{ Str::slug($center->name) }}-logo" class="text-xs w-7 bg-gray-300 dark:bg-gray-600 rounded">
                        {{ $center->name }}</h3>
                    <img src="{{ $center->image ? asset($center->image) : asset('svg/center.svg') }}" alt="{{ Str::slug($center->name) }}-image" class="text-xs w-sm h-36 bg-gray-300 dark:bg-gray-600 rounded">
                </div>
                <div class="center-data">
                    <p>
                        <x-svg.academic-cap-icon class="w-6 text-sky-600 dark:text-emerald-400"/>
                        <a href="{{ $center->center_url }}" class="text-blue-500 hover:underline">{{ $center->name }}</a>
                    </p>
                    <p>
                        <x-svg.phone-icon class="w-6 text-sky-600 dark:text-emerald-400"/>
                        {{ $center->phone }}</p>
                    <p>
                        <x-svg.map-pin-icon class="w-6 text-sky-600 dark:text-emerald-400"/>
                        {{ $center->address }}</p>
                    <p>
                        <x-svg.mail-icon class="w-6 text-sky-600 dark:text-emerald-400"/>
                        {{ $center->email }}</p>
                </div>
            </article>
        @endforeach
    </section>
</x-public-layout>
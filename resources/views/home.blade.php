<x-public-layout :title="__('Home')">
    <section class="flex flex-col gap-8 py-8 px-2 md:px-8">
        <h1 class="header-1">{{ __('Centers') }}</h1>
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
        @endforeach
    </section>
</x-public-layout>

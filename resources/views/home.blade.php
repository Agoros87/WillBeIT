<x-public-layout :title="__('Home')">
    @section('sidebar')
        <button class="cursor-pointer p-2 flex gap-2 font-semibold text-blue-600 dark:text-emerald-500 hover:bg-gray-200 dark:hover:bg-gray-700 transition rounded-xl">
            <x-svg.tags-icon class="w-6"/>{{ __('Tags') }}</button>
        <ul class="flex flex-col gap-2 text-blue-600 ml-4 pl-4 border-l-2 border-blue-500 dark:border-emerald-500">
            @foreach($tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endsection
    <section class="flex flex-col gap-8 py-8 px-2 md:px-8">
        <h1 class="text-5xl font-semibold text-blue-600 dark:text-emerald-500 drop-shadow drop-shadow-blue-300 dark:drop-shadow-emerald-700">{{ __('Centers') }}</h1>
        @foreach($centers as $center)
            <article class="reveal-scroll flex *:relative rounded-2xl shadow-lg w-fit">
                <div class="center-image">
                    <h3 class="text-base md:text-xl flex gap-2">
                        <img src="{{ $center->logo ? asset($center->logo) : asset('svg/center.svg') }}" alt="{{ Str::slug($center->name) }}-logo" class="text-xs w-5 md:w-7 bg-gray-300 dark:bg-gray-600 rounded">
                        {{ $center->name }}</h3>
                    <img src="{{ $center->image ? asset($center->image) : asset('svg/center.svg') }}" alt="{{ Str::slug($center->name) }}-image" class="text-xs w-60 h-24 md:w-sm md:h-36  bg-gray-300 dark:bg-gray-600 rounded">
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
                    <p>
                        <x-svg.post-icon class="w-6 text-sky-600 dark:text-emerald-400"/>
                        {{ __('Publications').': '.$center->posts_count }}</p>
                </div>
            </article>
        @endforeach
    </section>
</x-public-layout>
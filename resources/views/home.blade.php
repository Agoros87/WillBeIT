<x-public-layout :title="__('Home')">
    <section class="flex flex-col gap-12 py-10 px-4 md:px-12 max-w-7xl mx-auto">
        <div class="text-center flex flex-col items-center gap-4 max-w-3xl mx-auto">
            <h1 class="header-1 reveal-text transition-opacity">{{ __('Welcome to WillBeIT') }}</h1>
            <p class="text-base reveal-text md:text-lg text-gray-600 dark:text-gray-400">
                {{ __('Explore WillBeIT’s partner institutions across Europe. Enjoy and share unforgettable moments with your center.') }}
            </p>
        </div>
        <div class="flex justify-center items-center">
            <h2 class="header-2 reveal-text">{{ __('Centers').' WillBeIT' }}</h2>
        </div>
        <div class="flex flex-col gap-10 justify-center">
            @foreach($centers as $center)
                <article class="reveal-scroll flex flex-col md:flex-row *:relative rounded-2xl w-fit">
                    <a href="{{ $center->center_url }}" class="center-image">
                        <h3 class="header-3 flex gap-2">
                            <img src="{{ $center->logo ? asset($center->logo) : asset('svg/center.svg') }}" alt="{{ Str::slug($center->name) }}-logo" class="text-xs w-5 md:w-7 bg-gray-300 dark:bg-gray-600 rounded">
                            {{ $center->name }}</h3>
                        <img src="{{ $center->image ? asset($center->image) : asset('svg/center.svg') }}" alt="{{ Str::slug($center->name) }}-image">
                    </a>
                    <x-center-data :center="$center" class="center-data polygon"/>
                </article>
            @endforeach
        </div>
    </section>
</x-public-layout>

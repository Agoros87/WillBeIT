@props(['center'])
<div {{ $attributes ?? '' }}>
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
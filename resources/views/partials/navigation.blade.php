<div>
    <a class="text-xl text-blue-800 dark:text-white p-4 {{ !request()->routeIs('home') ?: 'underline' }}" href="{{ route('home') }}">{{ __('Home') }}</a>
    <a class="text-xl text-blue-800 dark:text-white p-4 {{ !request()->routeIs('') ?: 'underline' }}" href="{{ route('home') }}">{{ __('Posts') }}</a>
    <a class="text-xl text-blue-800 dark:text-white p-4 {{ !request()->routeIs('') ?: 'underline' }}" href="{{ route('podcasts.index') }}">{{ __('Podcasts') }}</a>
    <a class="text-xl text-blue-800 dark:text-white p-4 {{ !request()->routeIs('video.index') ?: 'underline' }}" href="{{ route('video.index') }}">{{ __('Videos') }}</a>
</div>

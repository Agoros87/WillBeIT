@props(['route'])
<a {{ $attributes->merge(['class' => request()->routeIs($route) ? 'active-nav-link' : 'not-active-nav-link']) }} href="{{ route($route) }}">
    {{ $slot }}
</a>
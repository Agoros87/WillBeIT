<header class="w-full flex flex-row justify-around bg-white dark:bg-zinc-900 shadow p-2">
    <nav class="flex flex-row justify-center gap-2">
        <x-nav-link route="home" class="group">
            <x-svg.home-icon class="w-7 group-hover:hidden md:group-hover:inline transition-all"/>
            <span class="hidden md:inline group-hover:inline">{{ __('Home') }}</span></x-nav-link>
        <x-nav-link route="posts.index" class="group">
            <x-svg.post-icon class="w-7 group-hover:hidden md:group-hover:inline transition-all"/>
            <span class="hidden md:inline group-hover:inline">{{ __('Posts') }}</span></x-nav-link>
        <x-nav-link route="podcasts.index" class="group">
            <x-svg.podcast-icon class="w-7 group-hover:hidden md:group-hover:inline transition-all"/>
            <span class="hidden md:inline group-hover:inline">{{ __('Podcasts') }}</span>
        </x-nav-link>
        <x-nav-link route="video.index" class="group">
            <x-svg.video-icon class="w-7 group-hover:hidden md:group-hover:inline transition-all"/>
            <span class="hidden md:inline group-hover:inline">{{ __('Videos') }}</span></x-nav-link>
    </nav>
    <div class="flex flex-row justify-between">
        <x-language-dropdown/>
        <x-user-dropdown/>
        <x-dark-mode-button/>
    </div>
    @fluxScripts
</header>

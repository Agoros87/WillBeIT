<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
<flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>
    <span class="font-bold text-blue-500"><strong>WillBeIt</strong></span> <!--Cuando tengamos logo, metemos logo-->
    @role('superadmin')
    <flux:navlist variant="outline">
        <flux:navlist.group :heading="__('Main')" class="grid">
            <a href="{{ route('home') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800">
                <x-svg.home-icon class="w-6"/>{{ __('Inicio') }}</a>
        </flux:navlist.group>
    </flux:navlist>
    <flux:navlist variant="outline"></flux:navlist>
    <flux:navlist.group class="grid" x-data="{ open: false }">
        <flux:navlist.group :heading="__('Operations')" class="grid">
            <div @click="open = !open" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="open ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <i class="fas fa-school"></i> <span>{{ __('Centers') }}</span>
                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="ml-auto text-sm opacity-70"></i>
            </div>
            <div x-show="open" x-collapse>
                <flux:navlist.item :href="route('centers.index')" :current="request()->routeIs('centers.index')" wire:navigate>
                    <i class="fas fa-eye"></i>
                    {{ __('View Centers') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('centers.create')" :current="request()->routeIs('centers.create')" wire:navigate>
                    <i class="fas fa-plus"></i>
                    {{ __('Create Center') }}
                </flux:navlist.item>
            </div>
        </flux:navlist.group>
    </flux:navlist.group>
    <flux:navlist variant="outline">
        <flux:navlist.group class="grid" x-data="{ openPosts: false }">
            <div @click="openPosts = !openPosts" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openPosts ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <i class="fas fa-file-alt"></i> <span>{{ __('Posts') }}</span>
                <i :class="openPosts ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="ml-auto text-sm opacity-70"></i>
            </div>
            <div x-show="openPosts" x-collapse>
                <flux:navlist.item :href="route('posts.index')" :current="request()->routeIs('posts.index')" wire:navigate>
                    <i class="fas fa-eye"></i>
                    {{ __('View Posts') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('posts.create')" :current="request()->routeIs('posts.create')" wire:navigate>
                    <i class="fas fa-plus"></i>
                    {{ __('Create post') }}
                </flux:navlist.item>
            </div>
        </flux:navlist.group>
    </flux:navlist>
    <flux:navlist variant="outline">
        <flux:navlist.group class="grid" x-data="{ openPodcast: false }">
            <div @click="openPodcast = !openPodcast" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openPodcast ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <i class="fas fa-eye"></i> <span>{{ __('Podcast') }}</span>
                <i :class="openPodcast ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="ml-auto text-sm opacity-70"></i>
            </div>
            <div x-show="openPodcast" x-collapse>
                <flux:navlist.item :href="route('podcasts.index')" :current="request()->routeIs('podcasts.index')" wire:navigate>
                    <i class="fas fa-eye"></i>
                    {{ __('View Podcasts') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('podcasts.create')" :current="request()->routeIs('podcasts.create')" wire:navigate>
                    <i class="fas fa-plus"></i>
                    {{ __('Create podcasts') }}
                </flux:navlist.item>
            </div>
        </flux:navlist.group>
    </flux:navlist>
    <flux:navlist variant="outline">
        <flux:navlist.group class="grid" x-data="{ openVideos: false }">
            <div @click="openVideos = !openVideos" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openVideos ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <i class="fas fa-video"></i> <span>{{ __('Videos') }}</span>
                <i :class="openVideos ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="ml-auto text-sm opacity-70"></i>
            </div>
            <div x-show="openVideos" x-collapse>
                <flux:navlist.item :href="route('video.index')" :current="request()->routeIs('video.index')" wire:navigate>
                    <i class="fas fa-eye"></i>
                    {{ __('View videos') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('video.create')" :current="request()->routeIs('video.create')" wire:navigate>
                    <i class="fas fa-plus"></i>
                    {{ __('Create videos') }}
                </flux:navlist.item>
            </div>
        </flux:navlist.group>
    </flux:navlist>
    <flux:navlist variant="outline">
        <flux:navlist.group class="grid" x-data="{ openTags: false }">
            <div @click="openTags = !openTags" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openTags ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <i class="fas fa-tags"></i> <span>{{ __('Tags') }}</span>
                <i :class="openTags ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="ml-auto text-sm opacity-70"></i>
            </div>
            <div x-show="openTags" x-collapse>
                <flux:navlist.item :href="route('tags.index')" :current="request()->routeIs('tags.index')" wire:navigate>
                    <i class="fas fa-eye"></i>
                    {{ __('View tags') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('tags.create')" :current="request()->routeIs('tags.create')" wire:navigate>
                    <i class="fas fa-plus"></i>
                    {{ __('Create tags') }}
                </flux:navlist.item>
            </div>
        </flux:navlist.group>
    </flux:navlist>
    <flux:navlist variant="outline">
        <flux:navlist.group class="grid" x-data="{ openTags: false }">
            <div @click="openTags = !openTags" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openTags ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <i class="fas fa-user"></i> <span>{{ __('Users') }}</span>
                <i :class="openTags ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="ml-auto text-sm opacity-70"></i>
            </div>
            <div x-show="openTags" x-collapse>
                <flux:navlist.item :href="route('users.index')" :current="request()->routeIs('users.index')" wire:navigate>
                    <i class="fas fa-eye"></i>
                    {{ __('View users') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('users.create')" :current="request()->routeIs('users.create')" wire:navigate>
                    <i class="fas fa-plus"></i>
                    {{ __('Create users') }}
                </flux:navlist.item>
            </div>
        </flux:navlist.group>
    </flux:navlist>
    @endrole
    <flux:spacer/>
    <!-- Desktop User Menu -->
    <flux:dropdown position="bottom" align="start">
        <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()" icon-trailing="chevrons-up-down"/>
        <flux:menu class="w-[220px]">
            <flux:menu.radio.group>
                <div class="p-0 text-sm font-normal">
                    <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>
                        <div class="grid flex-1 text-left text-sm leading-tight">
                            <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                            <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </div>
            </flux:menu.radio.group>
            <flux:menu.separator/>
            <flux:menu.radio.group>
                <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
            </flux:menu.radio.group>
            <flux:menu.separator/>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                    {{ __('Log Out') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
    <x-language-dropdown/>
</flux:sidebar>
<!-- Mobile User Menu -->
<flux:header class="lg:hidden">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>
    <flux:spacer/>
    <flux:dropdown position="top" align="end">
        <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down"/>
        <flux:menu>
            <flux:menu.radio.group>
                <div class="p-0 text-sm font-normal">
                    <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>
                        <div class="grid flex-1 text-left text-sm leading-tight">
                            <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                            <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </div>
            </flux:menu.radio.group>
            <flux:menu.separator/>
            <flux:menu.radio.group>
                <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
            </flux:menu.radio.group>
            <flux:menu.separator/>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                    {{ __('Log Out') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
    <x-language-dropdown/>
</flux:header>
{{ $slot }}

@fluxScripts
</body>
</html>

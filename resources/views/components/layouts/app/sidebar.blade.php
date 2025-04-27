<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <span class="font-bold text-blue-500"><strong>WillBeIt</strong></span> <!--Cuando tengamos logo, metemos logo-->

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Main')" class="grid">
                <flux:navlist.group class="grid">
                    <flux:navlist.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>{{ __('Inicio') }}</flux:navlist.item>
                </flux:navlist.group>
                </flux:navlist.group>
            </flux:navlist>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Centers')" class="grid">
                    @role('super-superadmin')
                    <flux:navlist.item :href="route('centers.index')" :current="request()->routeIs('centers.index')" wire:navigate>
                        <i class="fas fa-school"></i>
                        {{ __('Centers') }}
                    </flux:navlist.item>
                    <flux:navlist.item :href="route('centers.create')" :current="request()->routeIs('centers.create')" wire:navigate>
                        <i class="fas fa-school"></i>
                        {{ __('Create centers') }}
                    </flux:navlist.item>
                    @endrole
                </flux:navlist.group>
            </flux:navlist>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Posts')" class="grid">
                    @role('super-superadmin')
                    <flux:navlist.item :href="route('posts.index')" :current="request()->routeIs('posts.index')" wire:navigate>
                        <i class="fas fa-podcast"></i>
                        {{ __('Posts') }}
                    </flux:navlist.item>
                    <flux:navlist.item :href="route('posts.create')" :current="request()->routeIs('posts.create')" wire:navigate>
                        <i class="fas fa-podcast"></i>
                        {{ __('Create post') }}
                    </flux:navlist.item>
                    @endrole
                </flux:navlist.group>
            </flux:navlist>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Podcast')" class="grid">
                    @role('super-superadmin')
                    <flux:navlist.item :href="route('podcasts.index')" :current="request()->routeIs('podcasts.index')" wire:navigate>
                        <i class="fas fa-podcast"></i>
                        {{ __('Podcasts') }}
                    </flux:navlist.item>
                    <flux:navlist.item :href="route('podcasts.create')" :current="request()->routeIs('podcasts.create')" wire:navigate>
                        <i class="fas fa-podcast"></i>
                        {{ __('Create podcasts') }}
                    </flux:navlist.item>
                    @endrole
                </flux:navlist.group>
            </flux:navlist>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Videos')" class="grid">
                    @role('super-superadmin')
                    <flux:navlist.item :href="route('video.index')" :current="request()->routeIs('video.index')" wire:navigate>
                        <i class="fas fa-video"></i>
                        {{ __('See videos') }}
                    </flux:navlist.item>
                    <flux:navlist.item :href="route('video.create')" :current="request()->routeIs('video.create')" wire:navigate>
                        <i class="fas fa-video"></i>
                        {{ __('Create videos') }}
                    </flux:navlist.item>
                    @endrole
                </flux:navlist.group>
            </flux:navlist>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Tags')" class="grid">
                    @role('super-superadmin')
                    <flux:navlist.item :href="route('tags.index')" :current="request()->routeIs('tags.index')" wire:navigate>
                        <i class="fas fa-tags"></i>
                        {{ __('See tags') }}
                    </flux:navlist.item>
                    <flux:navlist.item :href="route('tags.create')" :current="request()->routeIs('tags.create')" wire:navigate>
                        <i class="fas fa-tags"></i>
                        {{ __('Create tags') }}
                    </flux:navlist.item>
                    @endrole
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
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

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
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

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>

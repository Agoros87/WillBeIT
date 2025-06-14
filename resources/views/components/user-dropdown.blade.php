@if (Route::has('login'))
    <nav class="flex items-center justify-end gap-4">
        @auth
            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()" icon-trailing="chevrons-up-down" class="[&_*]:group-hover:font-semibold [&_*]:!text-sky-600 [&_*]:dark:!text-emerald-400"/>
                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>
                                <div class="grid flex-1 text-left text-sm leading-tight text-black dark:text-white">
                                    <span class="truncate font-semibold ">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>
                    <flux:menu.separator/>
                    <!--Damos diferente dashboard según el rol que tenga-->
                    <flux:menu.radio.group>
                        @php $role = auth()->user()->roles?->first()?->name.'.' ?? '' @endphp
                        <a href="{{ route($role.'dashboard') }}" class="flex gap-2 text-sm p-2 group hover:bg-gray-50 dark:hover:bg-zinc-600 text-gray-700 dark:text-gray-200 rounded-md">
                            <x-svg.home-icon class="w-5 stroke-gray-500 dark:stroke-gray-400 group-hover:stroke-current"/>{{ __('Dashboard') }}</a>
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
        @else
            <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'hidden' : 'inline-block' }} px-5 py-1.5 dark:text-[#EDEDEC] text-sky-600 font-semibold border border-transparent hover:border-sky-600 dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                {{__("Log in")}} </a>
        @endauth
    </nav>
@endif

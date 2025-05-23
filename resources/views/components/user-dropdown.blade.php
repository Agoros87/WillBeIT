@if (Route::has('login'))
    <nav class="flex items-center justify-end gap-4">
        @auth
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
                    <!--Damos diferente dashboard según el rol que tenga-->
                    <flux:menu.radio.group>
                        @role('superadmin')
                        <flux:menu.item :href="route('superadmin.dashboard')" icon="home" wire:navigate>{{ __('Dashboard') }}</flux:menu.item>
                        {{--                                <!--DESCOMENTAR ESTO CUANDO SE HAGA EL DASHBOARD DE CADA UNO--}}
                        {{--                                @elserole('admin')--}}
                        {{--                                <flux:menu.item :href="route('admin.dashboard')" icon="home" wire:navigate>{{ __('Dashboard') }}</flux:menu.item>--}}
                        {{--                                @elserole('teacher')--}}
                        {{--                                <flux:menu.item :href="route('teacher.dashboard')" icon="home" wire:navigate>{{ __('Dashboard') }}</flux:menu.item>--}}
                        {{--                                @elserole('student')--}}
                        {{--                                <flux:menu.item :href="route('student.dashboard')" icon="home" wire:navigate>{{ __('Dashboard') }}</flux:menu.item>--}}
                        {{--                                -->--}}

                        @else
                            <flux:menu.item :href="route('dashboard')" icon="home" wire:navigate>{{ __('Dashboard') }}</flux:menu.item>

                            @endrole
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
            <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-blue-600 font-semibold border border-transparent hover:border-blue-600 dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                Log in </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-transparent hover:border-blue-600 border text-blue-600 font-semibold dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Register </a>
            @endif
        @endauth
    </nav>
@endif

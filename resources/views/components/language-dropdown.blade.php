<div class="hidden sm:flex sm:items-center sm:ms-6">
    <flux:dropdown position="bottom" align="start">
        <flux:profile :name="__('Language')" :initials="strtoupper(session('lang'))" icon-trailing="chevrons-up-down"/>
        <flux:menu class="w-[220px]">
            <flux:menu.radio.group>
                <flux:menu.item :href="route('languages', ['lang' => 'es'])">
                    <span class="ml-2">{{__('Spanish')}}</span>
                </flux:menu.item>
                <flux:menu.item :href="route('languages', ['lang' => 'en'])">
                    <span class="ml-2">{{__('English')}}</span>
                </flux:menu.item>
            </flux:menu.radio.group>
        </flux:menu>
    </flux:dropdown>
</div>
<div class="hidden sm:flex sm:items-center sm:ms-6">
    <flux:dropdown position="bottom" align="start">
        <flux:profile :name="__('Language')" :initials="strtoupper(session('lang'))" icon-trailing="chevrons-up-down"/>
        <flux:menu class="w-[220px]">
            <flux:menu.radio.group>
                @foreach($langKeys as $key)
                    <flux:menu.item :href="route('languages', ['lang' => $key])">
                        <span class="ml-2">{{__(explode(',', $languages[$key]['isoName'])[0])}}</span>
                    </flux:menu.item>
                @endforeach
            </flux:menu.radio.group>
        </flux:menu>
    </flux:dropdown>
</div>
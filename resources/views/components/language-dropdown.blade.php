<flux:dropdown position="bottom" class="hidden sm:flex sm:items-center">
    <flux:profile :name="__('Language')" :initials="strtoupper(session('lang'))" icon-trailing="chevrons-up-down"/>
    <flux:menu>
        <flux:menu.radio.group>
            @foreach($langKeys as $key)
                <flux:menu.item :href="route('languages', ['lang' => $key])">
                    <span class="ml-2">{{__(explode(',', $languages[$key]['isoName'])[0])}}</span>
                </flux:menu.item>
            @endforeach
        </flux:menu.radio.group>
    </flux:menu>
</flux:dropdown>
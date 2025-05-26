<div>
    {{-- Dropdown width > 768px --}}
    <flux:dropdown position="bottom" class="hidden md:flex items-center">
        <flux:profile :name="__('Language')" :initials="strtoupper(session('lang'))" icon-trailing="chevrons-up-down" class="cursor-pointer [&_*]:group-hover:font-semibold [&_*]:!text-sky-600 [&_*]:dark:!text-emerald-400"/>
        <flux:menu>
            <flux:menu.radio.group class="[&_*]:hover:bg-sky-100">
                @foreach($langKeys as $key)
                    <flux:menu.item :href="route('languages', ['lang' => $key])">
                        <span class="ml-2 text-sky-600">{{__(explode(',', $languages[$key]['isoName'])[0])}}</span>
                    </flux:menu.item>
                @endforeach
            </flux:menu.radio.group>
        </flux:menu>
    </flux:dropdown>
    {{-- Dropdown width < 768px --}}
    <flux:dropdown position="bottom" class="block md:hidden items-center">
        <flux:profile :initials="strtoupper(session('lang'))" icon-trailing="chevrons-up-down"/>
        <flux:menu>
            <flux:menu.radio.group>
                @foreach($langKeys as $key)
                    <flux:menu.item :href="route('languages', ['lang' => $key])">
                        <span class="ml-2 text-cyan-600">{{__(explode(',', $languages[$key]['isoName'])[0])}}</span>
                    </flux:menu.item>
                @endforeach
            </flux:menu.radio.group>
        </flux:menu>
    </flux:dropdown>
</div>

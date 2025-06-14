<svg viewBox="0 0 50 50" {{ $attributes->merge(['class' => 'rounded *:stroke-black dark:*:stroke-white hover:*:stroke-white cursor-pointer hover:bg-green-500 hover:[&_#punta]:fill-green-500 group']) }}>
    <defs>
        <path id="telefono" d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.22 11.36 11.36 0 003.57 1.1 1 1 0 01.86 1v3.3a1 1 0 01-1 1A17 17 0 013 5a1 1 0 011-1h3.3a1 1 0 011 .86 11.36 11.36 0 001.1 3.57 1 1 0 01-.21 1.09l-2.2 2.2z"/>
    </defs>
    <circle cx="25" cy="25" r="17" fill="none" stroke-width="4" class="stroke-black"/>
    <use href="#telefono" x="13" y="13" class="fill-black dark:fill-white group-hover:fill-white"/>
    <path d="M9 32 L7 43 L18 41" class="fill-black dark:fill-white group-hover:fill-white"/>
    <path id="punta" d="M13 32 L11 39 L18 37" class="fill-white dark:fill-zinc-900"/>
</svg>
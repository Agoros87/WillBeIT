<button onclick="document.documentElement.classList.toggle('dark'); sunIcon.classList.toggle('-translate-y-9'); moonIcon.classList.toggle('translate-y-9');"
        class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-blue-600 dark:text-emerald-400 relative overflow-hidden group">
    <x-svg.sun-icon id="sunIcon" class="w-6 h-6 transition duration-500 ease-in-out group-hover:-translate-y-9 dark:group-hover:translate-y-0"/>
    <x-svg.moon-icon id="moonIcon" class="w-6 h-6 absolute inset-2.5 translate-y-9 transition duration-500 ease-in-out group-hover:translate-y-0 dark:group-hover:translate-y-9"/>
</button>
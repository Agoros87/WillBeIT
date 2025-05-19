<button id="sidebarButton" class="cursor-pointer p-2 mr-2 rounded-lg text-blue-600 hover:text-white hover:bg-blue-600 dark:hover:bg-emerald-500 dark:text-emerald-500 transition">
    <!-- Icono para cuando el sidebar está cerrado -->
    <svg id="sidebarClosedIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
    </svg>
    <!-- Icono para cuando el sidebar está abierto -->
    <svg id="sidebarOpenedIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
    </svg>
</button>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const sidebarButton = document.getElementById('sidebarButton');
        const sidebarClosedIcon = document.getElementById('sidebarClosedIcon');
        const sidebarOpenedIcon = document.getElementById('sidebarOpenedIcon');

        sidebarButton.addEventListener('dblclick', (e) => {
            e.stopPropagation();
        });

        sidebar.style.width = '0px';

        sidebarButton.addEventListener('click', () => {
            if (sidebar.style.width === '0px') {
                sidebar.style.width = '256px';
            } else {
                sidebar.style.width = '0px';
            }

            sidebar.classList.toggle('px-4');
            sidebarClosedIcon.classList.toggle('hidden');
            sidebarOpenedIcon.classList.toggle('hidden');
        })
    })
</script>
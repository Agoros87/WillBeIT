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
    function toggleSidebar() {
        const sidebarButton = document.getElementById('sidebarButton');

        if (!sidebarButton) return;

        const sidebar = document.getElementById('sidebar');

        if (!sidebar) {
            sidebarButton.remove();
            return;
        }

        const sidebarClosedIcon = document.getElementById('sidebarClosedIcon');
        const sidebarOpenedIcon = document.getElementById('sidebarOpenedIcon');

        // Nuevo botón para evitar errores de livewire flux
        const newButton = sidebarButton.cloneNode(true);
        sidebarButton.parentNode.replaceChild(newButton, sidebarButton);

        newButton.addEventListener('dblclick', (e) => {
            e.preventDefault();
            e.stopPropagation();
        });

        sidebar.style.width = '0px';
        sidebar.style.minWidth = '0px';

        newButton.addEventListener('click', () => {
            const isCollapsed = sidebar.style.width === '0px';

            sidebar.style.width = isCollapsed ? '256px' : '0px';
            sidebar.style.minWidth = isCollapsed ? '256px' : '0px';

            sidebar.classList.toggle('px-4');

            if (sidebarClosedIcon && sidebarOpenedIcon) {
                sidebarClosedIcon.classList.toggle('hidden');
                sidebarOpenedIcon.classList.toggle('hidden');
            }
        });
    }

    function initSidebar() {
        const sidebar = document.getElementById('sidebar');
        if (!sidebar) return;
        toggleSidebar();
        sidebar.style.width = '0px';
    }

    document.addEventListener('DOMContentLoaded', initSidebar);
    document.addEventListener('livewire:navigated', initSidebar);
</script>

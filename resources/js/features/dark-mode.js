// Alternar el modo oscuro
export const toggleDarkMode = () => {
    const html = document.documentElement;
    if (html.classList.contains('dark')) {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    } else {
        html.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }
};

// Configurar el modo inicial basado en el almacenamiento local
export const initializeDarkMode = () => {
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme === 'dark') {
        document.documentElement.classList.add('dark');
    } else if (storedTheme === 'light') {
        document.documentElement.classList.remove('dark');
    }
};

export const darkModeToggleButtonAction = () => {
    document.addEventListener('DOMContentLoaded', () => {
        const darkModeToggleButton = document.getElementById('dark-mode-toggle');
        if (darkModeToggleButton) {
            darkModeToggleButton.addEventListener('click', toggleDarkMode);
        }
    });
};
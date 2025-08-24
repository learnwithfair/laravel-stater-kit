

// initialize in Sidenav and Topnav 
// Theme Toggle Toggle ________________________________________________

document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById('sidebar');
    const themeToggleBtn = document.getElementById('themeToggleBtn');

    // Load theme from localStorage
    let savedTheme = localStorage.getItem('sidebarTheme') || 'dark_sidebar';
    sidebar.className = `sidebar ${savedTheme}`;
    updateIcon(savedTheme);

    themeToggleBtn.addEventListener('click', function () {
        let currentTheme = sidebar.classList.contains('dark_sidebar') ? 'dark_sidebar' : 'sidebar';
        let newTheme = currentTheme === 'dark_sidebar' ? 'sidebar' : 'dark_sidebar';

        // Replace the whole class name instead of toggle
        sidebar.className = `sidebar ${newTheme}`;
        localStorage.setItem('sidebarTheme', newTheme);
        updateIcon(newTheme);
    });

    function updateIcon(theme) {
        themeToggleBtn.innerHTML = theme === 'dark_sidebar'
            ? '<i class="ti-thought"></i>'
            : '<i class="ti-shine"></i>';
    }
});


// Fullscreen Toggle ________________________________________________
const fullscreenBtn = document.getElementById('fullscreenBtn');

fullscreenBtn.addEventListener('click', function () {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen().catch((err) => {
            console.error(`Error attempting to enable full-screen mode: ${err.message}`);
        });
        fullscreenBtn.innerHTML = '<i class="ti-close"></i>'; // exit icon
    } else {
        document.exitFullscreen();
        fullscreenBtn.innerHTML = '<i class="ti-fullscreen"></i>'; // enter icon
    }
});

// Handle icon change when user exits via Esc key
document.addEventListener('fullscreenchange', () => {
    if (!document.fullscreenElement) {
        fullscreenBtn.innerHTML = '<i class="ti-fullscreen"></i>';
    }
});



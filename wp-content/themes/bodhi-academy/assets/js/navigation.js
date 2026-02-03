/**
 * Mobile Navigation Toggle
 */
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-navigation');
    const headerBottom = document.querySelector('.header-bottom');

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', function() {
            mainNav.classList.toggle('toggled');
            menuToggle.classList.toggle('active');
            
            // Expand parent height if needed (for absolute positioning adjustments)
            if(headerBottom) {
                headerBottom.classList.toggle('nav-open');
            }
        });
    }
});

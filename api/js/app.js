document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('nav-toggle-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (toggleBtn && mobileMenu) {
        toggleBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
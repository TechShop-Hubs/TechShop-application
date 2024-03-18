document.addEventListener("DOMContentLoaded", function () {
    const sidebarDropdowns = document.querySelectorAll('.sidebar-dropdown');
    sidebarDropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function () {
            const submenu = this.nextElementSibling;
            submenu.classList.toggle('show');
            this.querySelector('.fa-angle-right').classList.toggle('rotate');
        });
    });
});
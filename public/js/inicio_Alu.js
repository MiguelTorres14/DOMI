// Control de selección activa en el menú lateral del alumno
document.addEventListener('DOMContentLoaded', () => {
    const navItems = document.querySelectorAll('.nav-item');

    navItems.forEach(item => {
        item.addEventListener('click', function () {
            navItems.forEach(link => link.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
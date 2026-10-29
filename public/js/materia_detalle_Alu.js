document.addEventListener('DOMContentLoaded', () => {
    
    // --- Lógica de las Pestañas (Tabs) ---
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Quitar clase activa a todos
            tabBtns.forEach(b => b.classList.remove('active'));
            tabPanes.forEach(p => p.classList.remove('active'));

            // Activar la pestaña cliqueada
            btn.classList.add('active');
            const targetId = btn.getAttribute('data-tab');
            document.getElementById(targetId).classList.add('active');
        });
    });

    // --- Lógica del Acordeón (Unidades) ---
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const item = header.parentElement;
            const body = item.querySelector('.accordion-body');
            const icon = header.querySelector('.unit-meta svg polyline');

            // Si está cerrado, ábrelo. Si está abierto, ciérralo.
            if (item.classList.contains('collapsed')) {
                item.classList.remove('collapsed');
                body.style.display = 'block';
                // Cambia el ícono a "flecha arriba" (cerrar)
                if(icon) icon.setAttribute('points', '18 15 12 9 6 15');
            } else {
                item.classList.add('collapsed');
                body.style.display = 'none';
                // Cambia el ícono a "flecha abajo" (abrir)
                if(icon) icon.setAttribute('points', '6 9 12 15 18 9');
            }
        });
    });
});
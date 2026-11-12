document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('notifBtn');
    const panel = document.getElementById('notifPanel');
    const markRead = document.getElementById('notifMarkRead');
    if (!btn || !panel) return;

    const cerrar = () => {
        panel.hidden = true;
        btn.setAttribute('aria-expanded', 'false');
    };

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        panel.hidden = !panel.hidden;
        btn.setAttribute('aria-expanded', String(!panel.hidden));
    });

    document.addEventListener('click', (e) => {
        if (!panel.contains(e.target)) cerrar();
    });
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') cerrar();
    });

    // [PHP/BD]: aquí iría un fetch POST al controlador para marcar como leídas
    markRead?.addEventListener('click', () => {
        panel.querySelectorAll('.notif-item.unread').forEach(i => i.classList.remove('unread'));
        btn.querySelector('.notification-dot')?.remove();
    });
});
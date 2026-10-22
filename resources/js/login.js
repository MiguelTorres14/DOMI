document.addEventListener('DOMContentLoaded', () => {
    // Buscamos el input de contraseña y el botón del ojo por su ID
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.getElementById('togglePassword');

    if (passwordInput && toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            // Si el tipo es 'password', lo cambiamos a 'text', y viceversa
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
        });
    }
});
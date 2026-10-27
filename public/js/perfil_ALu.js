document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('subirImagenInput');
    const avatarBox = document.getElementById('avatarPreviewContainer');

    if (fileInput && avatarBox) {
        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    // [PHP/BD]: Esto es una previsualización visual antes de enviarla mediante el formulario POST a Laravel
                    avatarBox.style.backgroundImage = `url(${e.target.result})`;
                    avatarBox.style.backgroundSize = 'cover';
                    avatarBox.style.backgroundPosition = 'center';
                    avatarBox.textContent = ''; // Limpia las iniciales si hay imagen cargada
                };
                reader.readAsDataURL(file);
            }
        });
    }
});
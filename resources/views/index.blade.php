<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - DOMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/login.css', 'resources/js/login.js'])

</head>
<body>

    <div class="login-wrapper">
        <!-- Tarjeta principal -->
        <div class="login-card">
            
            <!-- Encabezado Azul -->
            <div class="card-header">
                <div class="logo-box">
                    <!-- Ícono de birrete en SVG -->
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    </svg>
                </div>
                <h1 class="brand-title">DOMI</h1>
                <p class="brand-subtitle">Tu espacio de aprendizaje personalizado</p>
            </div>

            <!-- Cuerpo del Formulario (Blanco) -->
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf <!-- Directiva de seguridad obligatoria en formularios de Laravel -->

                    <!-- EJEMPLO: Campo de Matrícula -->
                    <div class="form-group">
                        <label for="matricula" class="form-label">Matrícula</label>
                        <div class="input-wrapper">
                            <input 
                                type="text" 
                                id="matricula" 
                                name="matricula" 
                                class="form-input" 
                                placeholder="Ej: ISC-2024-0312" 
                                required
                            >
                        </div>
                    </div>

                    <!-- TODO 1: Crea aquí otro <div class="form-group"> para "Contraseña".
                         Usa un <div class="input-wrapper"> que adentro tenga:
                         1. Un <input type="password" id="password" class="form-input" placeholder="Ingresa tu contraseña">
                         2. Un <button type="button" id="togglePassword" class="eye-btn"> con un ícono o emoji de ojo 👁️ para mostrar/ocultar.
                    -->

                    <!-- TODO 2: Agrega un <div class="forgot-container"> con un enlace <a href="#" class="forgot-link"> para "¿Olvidaste tu contraseña?" -->

                    <!-- TODO 3: Agrega el botón principal: <button type="submit" class="btn-submit">Iniciar sesión</button> -->

                </form>

                <!-- Pie de la tarjeta -->
                <div class="card-footer">
                    <p>Plataforma de apoyo académico · DOMI 2024</p>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
<!-- Ventana de login -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - DOMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="{{ asset('js/login.js') }}" defer></script>
</head>

<body>

    <div class="login-wrapper">
        <div class="login-card">
            <!-- Encabezado de la tarjeta -->
            <div class="card-header">
                <div class="logo-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                        <path d="M6 12v5c3 3 9 3 12 0v-5" />
                    </svg>
                </div>
                <h1 class="brand-title">DOMI</h1>
                <p class="brand-subtitle">Tu espacio de aprendizaje personalizado</p>
            </div>

            <!-- Formulario de inicio de sesión -->
            <div class="card-body">
                <!-- CAMBIO 1: Apuntar a la ruta /login con método POST -->
                <form action="/login" method="POST">
                    <!-- CAMBIO 2: Agregar @csrf para seguridad de Laravel -->
                    @csrf

                    <div class="form-group">
                        <!-- Cambié el label a Correo para que coincida con la BD -->
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <div class="input-wrapper">
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-input"
                                placeholder="Ej: alumno@domi.com"
                                value="{{ old('email') }}"
                                required>
                        </div>
                        <!-- Mostrar error si falla el login -->
                        @error('email')
                        <span style="color: #ef4444; font-size: 0.85rem; margin-top: 5px; display: block;">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Campo de contraseña con botón para mostrar/ocultar -->
                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-wrapper">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-input"
                                placeholder="Ingresa tu contraseña"
                                required>
                            <button type="button" id="togglePassword" class="eye-btn">

                                <svg id="eyeOpen" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>

                                <svg id="eyeClosed" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" />
                                    <line x1="1" y1="1" x2="23" y2="23" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="forgot-container">
                        <a href="#" class="forgot-link">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="btn-submit">Iniciar sesión</button>

                    <div style="text-align: center; margin-top: 15px; font-size: 0.9rem;">
                        <span style="color: #64748b;">¿No tienes cuenta?</span>
                        <a href="{{ url('/register') }}" style="color: #2563eb; font-weight: bold; text-decoration: none;">Regístrate aquí</a>
                    </div>
                </form>

                <!-- Pie de página de la tarjeta -->
                <div class="card-footer">
                    <p>Plataforma de apoyo académico · DOMI</p>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
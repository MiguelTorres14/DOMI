<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - DOMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            <!-- Encabezado de la tarjeta -->
            <div class="card-header">
                <div class="logo-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    </svg>
                </div>
                <h1 class="brand-title">DOMI</h1>
                <p class="brand-subtitle">Crea tu cuenta y comienza a aprender</p>
            </div>

            <!-- Formulario de Registro -->
            <div class="card-body">
                <form action="/register" method="POST">
                    @csrf
                    
                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <label for="name" class="form-label">Nombre completo</label>
                        <div class="input-wrapper">
                            <input type="text" id="name" name="name" class="form-input" placeholder="Ej: Juan Pérez" value="{{ old('name') }}" required>
                        </div>
                        @error('name')
                            <span style="color: #ef4444; font-size: 0.85rem; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Campo Correo -->
                    <div class="form-group">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <div class="input-wrapper">
                            <input type="email" id="email" name="email" class="form-input" placeholder="Ej: alumno@domi.com" value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <span style="color: #ef4444; font-size: 0.85rem; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NUEVO: Campo Escuela -->
                    <div class="form-group">
                        <label for="school_id" class="form-label">Escuela</label>
                        <div class="input-wrapper">
                            <select id="school_id" name="school_id" class="form-input" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; background: white;">
                                <option value="">Selecciona tu institución</option>
                                @foreach($schools as $school)
                                    <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>
                                        {{ $school->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('school_id')
                            <span style="color: #ef4444; font-size: 0.85rem; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NUEVO: Campo Semestre -->
                    <div class="form-group">
                        <label for="semester" class="form-label">Semestre Actual</label>
                        <div class="input-wrapper">
                            <select id="semester" name="semester" class="form-input" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; background: white;">
                                <option value="">Selecciona tu semestre</option>
                                @for($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>
                                        {{ $i }}° Semestre
                                    </option>
                                @endfor
                            </select>
                        </div>
                        @error('semester')
                            <span style="color: #ef4444; font-size: 0.85rem; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password" class="form-input" placeholder="Mínimo 5 caracteres" required>
                        </div>
                        @error('password')
                            <span style="color: #ef4444; font-size: 0.85rem; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Campo Confirmar Contraseña -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <div class="input-wrapper">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Repite tu contraseña" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Registrarse</button>
                </form>

                <!-- Enlace para volver al login -->
                <div class="card-footer" style="margin-top: 15px;">
                    <p>¿Ya tienes una cuenta? <a href="{{ url('/login') }}" style="color: #2563eb; font-weight: bold; text-decoration: none;">Inicia sesión aquí</a></p>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
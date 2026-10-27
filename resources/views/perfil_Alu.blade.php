<!-- Ventana de Perfil para el rol de Alumno -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del alumno - DOMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/perfil_Alu.css') }}">
    <script src="{{ asset('js/perfil_Alu.js') }}" defer></script>
</head>
<body>

    <div class="dashboard-layout">
        
        <!-- Panel lateral izquierdo (Sidebar) -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <div class="brand-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    </svg>
                </div>
                <span class="brand-name">DOMI</span>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ url('/inicio_Alu') }}" class="nav-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    <span>Inicio</span>
                </a>

                <a href="{{ url('/perfil') }}" class="nav-item active">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span>Perfil del alumno</span>
                </a>

                <a href="#" class="nav-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <span>Materias</span>
                </a>

                <a href="#" class="nav-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"/>
                        <line x1="12" y1="20" x2="12" y2="4"/>
                        <line x1="6" y1="20" x2="6" y2="14"/>
                    </svg>
                    <span>Mi progreso</span>
                </a>

                <a href="#" class="nav-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6"/>
                        <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
                    </svg>
                    <span>Recompensas</span>
                </a>
            </nav>

            <!-- [PHP/BD]: Datos de sesión del alumno en el pie del sidebar -->
            <div class="sidebar-footer">
                <div class="user-avatar-sm">AG</div>
                <div class="user-details">
                    <p class="user-name">Ana García</p>
                    <p class="user-semester">3° Semestre</p>
                </div>
            </div>
        </aside>

        <!-- Contenedor principal derecho -->
        <div class="main-wrapper">
            
            <!-- Barra superior -->
            <header class="topbar">
                <h2 class="page-title">Perfil del alumno</h2>
                
                <div class="topbar-actions">
                    <!-- [PHP/BD]: Nombre corto del usuario autenticado -->
                    <span class="greeting">Hola, <strong>Ana</strong></span>
                    
                    <!-- [PHP/BD]: Notificaciones pendientes desde la base de datos -->
                    <button type="button" class="notification-btn" aria-label="Notificaciones">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                        </svg>
                        <span class="notification-dot"></span>
                    </button>

                    <!-- [PHP/BD]: Iniciales o avatar actual del usuario autenticado -->
                    <div class="profile-pill">
                        <div class="avatar-circle">AG</div>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </div>
                </div>
            </header>

            <!-- Área de contenido -->
            <main class="content-area">
                
                <!-- Tarjeta central de Perfil del Alumno -->
                <section class="profile-card-container">
                    
                    <!-- Encabezado azul de la tarjeta -->
                    <div class="profile-card-header">
                        <!-- [PHP/BD]: Si el alumno tiene foto en la BD, mostrar, si no, mostrar iniciales -->
                        <div class="profile-avatar-box" id="avatarPreviewContainer">AG</div>
                        
                        <div class="profile-header-info">
                            <!-- [PHP/BD]: Nombre completo desde la BD ->-->
                            <h1>Ana García López</h1>
                            
                            <!-- [PHP/BD]: Matrícula desde la BD ->-->
                            <p class="profile-matricula">ISC-2024-0312</p>
                            
                            <div class="profile-header-badges">
                                <!-- [PHP/BD]: Semestre y estado ->-->
                                <span class="header-badge">3° Semestre</span>
                                <span class="header-badge">Activo</span>
                            </div>
                        </div>
                    </div>

                    <!-- Cuerpo con información y opción de subir imagen -->
                    <div class="profile-card-body">
                        
                        <!-- Fila 1: Nombre completo -->
                        <div class="info-row">
                            <span class="info-label">Nombre completo</span>
                            <span class="info-value">Ana García López</span>
                            <span class="readonly-tag">Solo lectura</span>
                        </div>

                        <!-- Fila 2: Matrícula -->
                        <div class="info-row">
                            <span class="info-label">Matrícula</span>
                            <span class="info-value">ISC-2024-0312</span>
                            <span class="readonly-tag">Solo lectura</span>
                        </div>

                        <!-- Fila 3: Carrera -->
                        <div class="info-row">
                            <span class="info-label">Carrera</span>
                            <span class="info-value">Ingeniería en Sistemas Computacionales</span>
                            <span class="readonly-tag">Solo lectura</span>
                        </div>

                        <!-- Fila 4: Semestre actual -->
                        <div class="info-row">
                            <span class="info-label">Semestre actual</span>
                            <span class="info-value">3° Semestre</span>
                            <span class="readonly-tag">Solo lectura</span>
                        </div>

                        <!-- Fila 5: Correo institucional -->
                        <div class="info-row">
                            <span class="info-label">Correo institucional</span>
                            <span class="info-value">ana.garcia@universidad.edu.mx</span>
                            <span class="readonly-tag">Solo lectura</span>
                        </div>

                        <!-- Sección para actualizar la foto de perfil -->
                        <!-- [PHP/BD]: Formulario POST que envía el archivo a un controlador Laravel (ej: route('perfil.avatar')) con enctype="multipart/form-data" -->
                        <form action="#" method="POST" enctype="multipart/form-data" class="profile-actions">
                            @csrf
                            <label for="subirImagenInput" class="btn-upload-image">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="17 8 12 3 7 8"/>
                                    <line x1="12" y1="3" x2="12" y2="15"/>
                                </svg>
                                Subir imagen
                            </label>
                            <input type="file" id="subirImagenInput" name="avatar" accept="image/*" style="display: none;">
                        </form>

                    </div>

                </section>

            </main>

            <!-- Botón de ayuda flotante -->
            <button type="button" class="help-fab" title="Ayuda">?</button>
        </div>

    </div>

</body>
</html>
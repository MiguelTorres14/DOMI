<!-- Ventana de Inicio para el rol de Alumno -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Alumno - DOMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/inicio_Alu.css') }}">
    <script src="{{ asset('js/inicio_Alu.js') }}" defer></script>
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
                <a href="{{ url('/inicio_Alu') }}" class="nav-item active">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    <span>Inicio</span>
                </a>

                <a href="{{ url('/perfil') }}" class="nav-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span>Perfil del alumno</span>
                </a>

                <a href="{{ url('/materias') }}" class="nav-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <span>Materias</span>
                </a>

                <a href="{{ url('/progreso') }}" class="nav-item">
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

            <!-- Datos del alumno en la parte inferior -->
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
                <h2 class="page-title">Inicio</h2>
                
                <div class="topbar-actions">
                    <span class="greeting">Hola, <strong>Ana</strong></span>
                    
                    <button type="button" class="notification-btn" aria-label="Notificaciones">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                        </svg>
                        <span class="notification-dot"></span>
                    </button>

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
                
                <!-- Banner principal de bienvenida -->
                <section class="welcome-banner">
                    <div class="banner-text">
                        <h1>¡Bienvenido a DOMI!</h1>
                        <p>Tu espacio de aprendizaje personalizado. Consulta tus materias, estudia con materiales organizados por semestre, practica con cuestionarios y obtén recompensas por tu esfuerzo.</p>
                        
                        <div class="banner-badges">
                            <span class="badge">Ingeniería en Sistemas Computacionales</span>
                            <span class="badge">3° Semestre</span>
                            <span class="badge">0 cuestionarios completados</span>
                        </div>
                    </div>

                    <div class="banner-watermark">
                        <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                        </svg>
                    </div>
                </section>

                <!-- Sección de Accesos rápidos -->
                <section class="quick-access-section">
                    <h3 class="section-subtitle">Accesos rápidos</h3>

                    <div class="cards-grid">
                        
                        <!-- Tarjeta 1: Perfil del alumno -->
                        <div class="access-card">
                            <div class="card-icon icon-blue">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h4>Perfil del alumno</h4>
                            <p>Consulta tu información personal y académica</p>
                            <a href="{{ url('/perfil') }}" class="card-btn btn-outline-blue">Ver perfil</a>
                        </div>

                        <!-- Tarjeta 2: Mis materias -->
                        <div class="access-card">
                            <div class="card-icon icon-purple">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                                </svg>
                            </div>
                            <h4>Mis materias</h4>
                            <p>Explora las asignaturas y materiales organizados por semestre</p>
                            <a href="{{ url('/materias') }}" class="card-btn btn-outline-purple">Ver materias</a>
                        </div>

                        <!-- Tarjeta 4: Mi progreso -->
                        <div class="access-card">
                            <div class="card-icon icon-yellow">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="20" x2="18" y2="10"/>
                                    <line x1="12" y1="20" x2="12" y2="4"/>
                                    <line x1="6" y1="20" x2="6" y2="14"/>
                                </svg>
                            </div>
                            <h4>Mi progreso</h4>
                            <p>Visualiza las actividades completadas y tu avance en la plataforma</p>
                            <a href="{{ url('/progreso') }}" class="card-btn btn-outline-yellow">Ver progreso</a>
                        </div>

                        <!-- Tarjeta 5: Mis recompensas -->
                        <div class="access-card">
                            <div class="card-icon icon-pink">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="6"/>
                                    <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
                                </svg>
                            </div>
                            <h4>Mis recompensas</h4>
                            <p>Responde cuestionarios y descubre los beneficios por tu dedicación</p>
                            <a href="#" class="card-btn btn-outline-pink">Ver recompensas</a>
                        </div>

                    </div>
                </section>

            </main>

            <!-- Botón de ayuda flotante inferior derecho -->
            <button type="button" class="help-fab" title="Ayuda">?</button>
        </div>

    </div>

</body>
</html>
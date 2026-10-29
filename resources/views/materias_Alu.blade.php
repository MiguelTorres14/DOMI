<!-- Ventana de Materias para el rol de Alumno -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis materias - DOMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/materias_Alu.css') }}">
    <script src="{{ asset('js/materias_Alu.js') }}" defer></script>
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

                <a href="{{ url('/perfil') }}" class="nav-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span>Perfil del alumno</span>
                </a>

                <a href="{{ url('/materias') }}" class="nav-item active">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/>
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
                <h2 class="page-title">Mis materias</h2>
                
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

            <!-- Área de contenido de Materias -->
            <main class="content-area">
                
                <!-- Encabezado de la sección -->
                <div class="section-header">
                    <h2>Mis materias</h2>
                    <p>Selecciona una materia para consultar sus temas, materiales y cuestionarios</p>
                    <div class="course-info">
                        {{-- [PHP/BD]: {{ Auth::user()->carrera }} --}}
                        <span class="career">Ingeniería en Sistemas Computacionales</span>
                        {{-- [PHP/BD]: {{ Auth::user()->semestre }} --}}
                        <span class="semester">3° Semestre</span>
                    </div>
                </div>

                <!-- Cuadrícula de tarjetas de materias -->
                <div class="subjects-grid">
                    
                    <!-- INICIO MATERIA DE EJEMPLO (Fundamentos de Programación) -->
                    {{-- [PHP/BD]: Aquí irá el @foreach($materias as $materia) ... --}}
                    <div class="subject-card border-blue">
                        
                        <div class="card-content">
                            <!-- Ícono de la materia -->
                            <div class="subject-icon-box icon-blue">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="16 18 22 12 16 6"/>
                                    <polyline points="8 6 2 12 8 18"/>
                                </svg>
                            </div>
                            
                            <!-- Título y descripción -->
                            <div class="subject-details">
                                {{-- [PHP/BD]: {{ $materia->nombre }} --}}
                                <h3>Fundamentos de Programación</h3>
                                {{-- [PHP/BD]: {{ $materia->descripcion }} --}}
                                <p>Algoritmos, estructuras de control y paradigmas básicos de programación</p>
                            </div>
                        </div>

                        <!-- Estadísticas de la materia (Unidades, Docs, Quizzes) -->
                        <div class="subject-stats">
                            <span class="stat-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                                2 unidades
                            </span>
                            <span class="stat-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                4 docs
                            </span>
                            <span class="stat-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                2 quizzes
                            </span>
                        </div>

                        <!-- Barra de progreso -->
                        <div class="progress-section">
                            <div class="progress-labels">
                                <span>Progreso</span>
                                {{-- [PHP/BD]: {{ $materia->porcentaje_progreso }}% --}}
                                <span class="progress-percent text-blue">0%</span>
                            </div>
                            <div class="progress-bar-bg">
                                {{-- [PHP/BD]: style="width: {{ $materia->porcentaje_progreso }}%;" --}}
                                <div class="progress-bar-fill bg-blue" style="width: 0%;"></div>
                            </div>
                        </div>

                        <!-- Botón de acción principal -->
                        {{-- [PHP/BD]: href="{{ route('materias.show', $materia->id) }}" --}}
                        <a href="{{ url('/materia/detalle') }}" class="btn-subject bg-blue">Ver materia</a>
                    </div>
                    {{-- [PHP/BD]: Aquí terminaría el @endforeach --}}
                    <!-- FIN MATERIA DE EJEMPLO -->
                    
                </div>
            </main>

            <!-- Botón flotante de ayuda -->
            <button type="button" class="help-fab" title="Ayuda">?</button>
        </div>
    </div>
</body>
</html>
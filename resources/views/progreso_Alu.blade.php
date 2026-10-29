<!-- Ventana de Progreso para el rol de Alumno -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi progreso - DOMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Librería Chart.js para dibujar la gráfica de evolución -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <link rel="stylesheet" href="{{ asset('css/progreso_Alu.css') }}">
    <script src="{{ asset('js/progreso_Alu.js') }}" defer></script>
</head>
<body>

    <div class="dashboard-layout">
        
        <!-- Sidebar (Panel Lateral) -->
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
                <a href="{{ url('/inicio') }}" class="nav-item">
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
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/>
                    </svg>
                    <span>Materias</span>
                </a>

                <a href="{{ url('/progreso') }}" class="nav-item active">
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

        <!-- Contenedor Principal -->
        <div class="main-wrapper">
            
            <!-- Barra Superior (Topbar) -->
            <header class="topbar">
                <h2 class="page-title">Mi progreso</h2>
                
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

            <!-- Área de Contenido -->
            <main class="content-area">
                
                <div class="section-header">
                    <h2>Mi progreso</h2>
                    <p>Seguimiento de tus actividades dentro de DOMI</p>
                </div>

                <!-- Fila 1: Tarjetas de estadísticas generales -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon icon-blue">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        </div>
                        {{-- [PHP/BD]: {{ $alumno->materias_consultadas }} --}}
                        <h3 class="stat-value">1</h3>
                        <p class="stat-label">Materias consultadas</p>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-purple">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        </div>
                        {{-- [PHP/BD]: {{ $alumno->temas_estudiados }} --}}
                        <h3 class="stat-value">2</h3>
                        <p class="stat-label">Temas estudiados</p>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-green">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        {{-- [PHP/BD]: {{ $alumno->cuestionarios_completados }} --}}
                        <h3 class="stat-value">0</h3>
                        <p class="stat-label">Cuestionarios completados</p>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-yellow">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        {{-- [PHP/BD]: {{ $alumno->cuestionarios_pendientes }} --}}
                        <h3 class="stat-value">6</h3>
                        <p class="stat-label">Cuestionarios pendientes</p>
                    </div>
                </div>

                <!-- Fila 2: Gráfica de evolución -->
                <div class="chart-container">
                    <div class="chart-header">
                        <h3>Evolución del rendimiento en cuestionarios</h3>
                        <p>Puntaje promedio por semana (%)</p>
                    </div>
                    
                    <div class="canvas-wrapper">
                        <!-- Canvas donde Chart.js dibujará la gráfica -->
                        <canvas id="rendimientoChart"></canvas>
                    </div>
                </div>

                <!-- Fila 3: Avance por materia (Solo ejemplo visual según tu captura) -->
                <div class="course-progress-container">
                    <h3>Avance por materia</h3>
                    
                    {{-- [PHP/BD]: @foreach($materias_inscritas as $materia) ... --}}
                    <div class="course-progress-item">
                        <div class="course-progress-info">
                            <div class="course-name-box">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                                <h4>Fundamentos de Programación</h4>
                            </div>
                            {{-- [PHP/BD]: {{ $materia->temas_completados }}/{{ $materia->total_temas }} --}}
                            <span class="course-percent">0/2 <strong class="text-blue">0%</strong></span>
                        </div>
                        <div class="progress-bar-bg">
                            {{-- [PHP/BD]: style="width: {{ $materia->porcentaje }}%;" --}}
                            <div class="progress-bar-fill bg-blue" style="width: 0%;"></div>
                        </div>
                    </div>
                    {{-- [PHP/BD]: @endforeach --}}
                </div>

            </main>

            <!-- Botón flotante -->
            <button type="button" class="help-fab" title="Ayuda">?</button>
        </div>
    </div>

</body>
</html>
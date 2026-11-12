<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - DOMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- CSS compartido (SIEMPRE antes que el de cada página) --}}
    <link rel="stylesheet" href="{{ asset('css/alumno_layout.css') }}">
    <script src="{{ asset('js/alumno_layout.js') }}" defer></script>

    {{-- CSS y JS propios de cada página --}}
    @stack('styles')
    @stack('scripts')
</head>
<body>

    <div class="dashboard-layout">

        <!-- Sidebar -->
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
                <a href="{{ url('/inicio_Alu') }}" class="nav-item {{ request()->is('inicio_Alu*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    <span>Inicio</span>
                </a>

                <a href="{{ url('/perfil') }}" class="nav-item {{ request()->is('perfil*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span>Perfil del alumno</span>
                </a>

                <a href="{{ url('/materias') }}" class="nav-item {{ request()->is('materias*', 'materia*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <span>Materias</span>
                </a>

                <a href="{{ url('/progreso') }}" class="nav-item {{ request()->is('progreso*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"/>
                        <line x1="12" y1="20" x2="12" y2="4"/>
                        <line x1="6" y1="20" x2="6" y2="14"/>
                    </svg>
                    <span>Mi progreso</span>
                </a>

                <a href="{{ url('/recompensas') }}" class="nav-item {{ request()->is('recompensas*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6"/>
                        <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
                    </svg>
                    <span>Recompensas</span>
                </a>
            </nav>

            {{-- [PHP/BD]: Datos de sesión del alumno en el pie del sidebar --}}
            <div class="sidebar-footer">
                <div class="user-avatar-sm">AG</div>
                <div class="user-details">
                    <p class="user-name">Ana García</p>
                    <p class="user-semester">3° Semestre</p>
                </div>
            </div>
        </aside>

        <!-- Contenedor principal -->
        <div class="main-wrapper">

            <!-- Topbar -->
            <header class="topbar">
                <h2 class="page-title">@yield('page-title')</h2>

                <div class="topbar-actions">
                    {{-- [PHP/BD]: Nombre corto del usuario autenticado --}}
                    <span class="greeting">Hola, <strong>Ana</strong></span>

                    {{-- [PHP/BD]: Notificaciones pendientes desde la base de datos --}}
                    <div class="notif-wrapper">
                        <button type="button" class="notification-btn" id="notifBtn" aria-label="Notificaciones" aria-expanded="false">
                            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                            </svg>
                            {{-- [PHP/BD]: mostrar solo si hay notificaciones sin leer --}}
                            <span class="notification-dot"></span>
                        </button>

                        <div class="notif-panel" id="notifPanel" hidden>
                            <div class="notif-header">
                                <h5>Notificaciones</h5>
                                {{-- [PHP/BD]: ruta para marcar todas como leídas --}}
                                <button type="button" class="notif-mark-read" id="notifMarkRead">Marcar como leídas</button>
                            </div>
                            <ul class="notif-list">
                                {{-- [PHP/BD]: @forelse($notificaciones as $n) ... --}}
                                <li class="notif-item unread">
                                    <p class="notif-title">Nuevo cuestionario disponible</p>
                                    <p class="notif-text">Ya puedes responder “Algoritmos y Estructuras de Control”.</p>
                                    <span class="notif-time">Hace 2 h</span>
                                </li>
                                {{-- [PHP/BD]: @empty <li class="notif-empty">No tienes notificaciones</li> @endforelse --}}
                            </ul>
                        </div>
                    </div>

                    {{-- [PHP/BD]: Iniciales o avatar actual del usuario autenticado --}}
                    <div class="profile-pill">
                        <div class="avatar-circle">AG</div>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </div>
                </div>
            </header>

            <!-- Contenido de cada página -->
            <main class="content-area">
                @yield('content')
            </main>

            <button type="button" class="help-fab" title="Ayuda">?</button>
        </div>

    </div>

</body>
</html>
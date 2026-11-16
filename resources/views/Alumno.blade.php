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
                <a href="{{ url('/alumno/inicio') }}" class="nav-item {{ request()->is('alumno/inicio*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    <span>Inicio</span>
                </a>

                <a href="{{ url('/alumno/perfil') }}" class="nav-item {{ request()->is('alumno/perfil*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span>Perfil del alumno</span>
                </a>

                <a href="{{ url('/alumno/materias') }}" class="nav-item {{ request()->is('alumno/materias*', 'alumno/materia*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <span>Materias</span>
                </a>

                <a href="{{ url('/alumno/progreso') }}" class="nav-item {{ request()->is('alumno/progreso*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"/>
                        <line x1="12" y1="20" x2="12" y2="4"/>
                        <line x1="6" y1="20" x2="6" y2="14"/>
                    </svg>
                    <span>Mi progreso</span>
                </a>

                <a href="{{ url('/alumno/recompensas') }}" class="nav-item {{ request()->is('alumno/recompensas*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6"/>
                        <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
                    </svg>
                    <span>Recompensas</span>
                </a>
            </nav>

            @php
                $nombres = explode(' ', Auth::user()->name);
                $iniciales = strtoupper(substr($nombres[0], 0, 1) . substr($nombres[1] ?? '', 0, 1));
            @endphp
            <div class="sidebar-footer" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="user-avatar-sm">{{ $iniciales }}</div>
                    <div class="user-details">
                        <p class="user-name" style="margin: 0;">{{ Auth::user()->name }}</p>
                        <p class="user-semester" style="margin: 0; font-size: 0.75rem;">Alumno Activo</p>
                    </div>
                </div>
                
                <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" title="Cerrar Sesión" style="background: none; border: none; color: #cbd5e1; cursor: pointer; padding: 5px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    </button>
                </form>
            </div>
        </aside>

        <div class="main-wrapper">

            <header class="topbar">
                <h2 class="page-title">@yield('page-title')</h2>

                <div class="topbar-actions">
                    <span class="greeting">Hola, <strong>{{ explode(' ', Auth::user()->name)[0] }}</strong></span>

                    <!-- NUEVO: Mostrar puntos actuales -->
                    <div style="background: #fef08a; color: #854d0e; padding: 6px 15px; border-radius: 20px; font-weight: bold; display: flex; align-items: center; gap: 5px; margin-right: 15px; font-size: 0.9rem;">
                        🪙 {{ Auth::user()->points }} pts
                    </div>

                    <div class="notif-wrapper">
                        <button type="button" class="notification-btn" id="notifBtn" aria-label="Notificaciones" aria-expanded="false">
                            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                            </svg>
                            <span class="notification-dot"></span>
                        </button>
                    </div>

                    <div class="profile-pill">
                        <div class="avatar-circle">{{ $iniciales }}</div>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </div>
                </div>
            </header>

            <main class="content-area">
                @yield('content')
            </main>

            <button type="button" class="help-fab" title="Ayuda">?</button>
        </div>

    </div>

</body>
</html>
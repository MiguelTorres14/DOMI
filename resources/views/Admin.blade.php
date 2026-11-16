<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin DOMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/alumno_layout.css') }}">
    <script src="{{ asset('js/alumno_layout.js') }}" defer></script>

    @stack('styles')
    @stack('scripts')
</head>
<body>

    <div class="dashboard-layout">

        <aside class="sidebar">
            <div class="sidebar-brand">
                <div class="brand-icon" style="background: #ef4444;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <span class="brand-name">DOMI Admin</span>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.materias.index') }}" class="nav-item {{ request()->routeIs('admin.materias*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    <span>Materias</span>
                </a>

                <!-- NUEVO ENLACE DE ALUMNOS -->
                <a href="{{ route('admin.usuarios.index') }}" class="nav-item {{ request()->routeIs('admin.usuarios*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    <span>Alumnos</span>
                </a>
            </nav>

            @php
                $nombres = explode(' ', Auth::user()->name);
                $iniciales = strtoupper(substr($nombres[0], 0, 1) . substr($nombres[1] ?? '', 0, 1));
            @endphp
            <div class="sidebar-footer" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="user-avatar-sm" style="background: #ef4444;">{{ $iniciales }}</div>
                    <div class="user-details">
                        <p class="user-name" style="margin: 0;">{{ Auth::user()->name }}</p>
                        <p class="user-semester" style="margin: 0; font-size: 0.75rem;">Administrador</p>
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
                    <div class="profile-pill">
                        <div class="avatar-circle" style="background: #ef4444;">{{ $iniciales }}</div>
                    </div>
                </div>
            </header>

            <main class="content-area">
                @if(session('success'))
                    <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-weight: bold;">
                        {{ session('success') }}
                    </div>
                @endif
                
                @yield('content')
            </main>

        </div>
    </div>

</body>
</html>
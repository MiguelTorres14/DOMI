@extends('Alumno')

@section('title', 'Inicio Alumno')
@section('page-title', 'Inicio')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/inicio_Alu.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/inicio_Alu.js') }}" defer></script>
@endpush

@section('content')

    <!-- Banner de bienvenida -->
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

    <!-- Accesos rápidos -->
    <section class="quick-access-section">
        <h3 class="section-subtitle">Accesos rápidos</h3>

        <div class="cards-grid">

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

@endsection
@extends('Alumno')

@section('title', 'Perfil del alumno')
@section('page-title', 'Perfil del alumno')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perfil_Alu.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/perfil_Alu.js') }}" defer></script>
@endpush

@section('content')

    @php
        $nombres = explode(' ', Auth::user()->name);
        $iniciales = strtoupper(substr($nombres[0], 0, 1) . substr($nombres[1] ?? '', 0, 1));
    @endphp

    <!-- Tarjeta central de Perfil del Alumno -->
    <section class="profile-card-container">

        <!-- Encabezado azul de la tarjeta -->
        <div class="profile-card-header">
            <div class="profile-avatar-box" id="avatarPreviewContainer">{{ $iniciales }}</div>

            <div class="profile-header-info">
                <h1>{{ Auth::user()->name }}</h1>
                <p class="profile-matricula">Matrícula Pendiente</p> <!-- Dato estático por falta de campo en BD -->

                <div class="profile-header-badges">
                    <!-- DINÁMICO: Semestre actual -->
                    <span class="header-badge">{{ Auth::user()->semester }}° Semestre</span>
                    <span class="header-badge">Activo</span>
                </div>
            </div>
        </div>

        <!-- Cuerpo con información y opción de subir imagen -->
        <div class="profile-card-body">

            <!-- Fila 1: Nombre completo -->
            <div class="info-row">
                <span class="info-label">Nombre completo</span>
                <span class="info-value">{{ Auth::user()->name }}</span>
                <span class="readonly-tag">Solo lectura</span>
            </div>

            <!-- Fila 2: Matrícula -->
            <div class="info-row">
                <span class="info-label">Matrícula</span>
                <span class="info-value">Pendiente de asignar</span>
                <span class="readonly-tag">Solo lectura</span>
            </div>

            <!-- Fila 3: Escuela (Carrera) -->
            <div class="info-row">
                <span class="info-label">Institución</span>
                <!-- DINÁMICO: Nombre de la escuela desde la relación -->
                <span class="info-value">{{ Auth::user()->school->name ?? 'Institución no asignada' }}</span>
                <span class="readonly-tag">Solo lectura</span>
            </div>

            <!-- Fila 4: Semestre actual -->
            <div class="info-row">
                <span class="info-label">Semestre actual</span>
                <!-- DINÁMICO: Semestre -->
                <span class="info-value">{{ Auth::user()->semester }}° Semestre</span>
                <span class="readonly-tag">Solo lectura</span>
            </div>

            <!-- Fila 5: Correo institucional -->
            <div class="info-row">
                <span class="info-label">Correo institucional</span>
                <span class="info-value">{{ Auth::user()->email }}</span>
                <span class="readonly-tag">Solo lectura</span>
            </div>

            <!-- Sección para actualizar la foto de perfil -->
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

@endsection
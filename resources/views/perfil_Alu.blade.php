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

    <!-- Tarjeta central de Perfil del Alumno -->
    <section class="profile-card-container">

        <!-- Encabezado azul de la tarjeta -->
        <div class="profile-card-header">
            {{-- [PHP/BD]: Si el alumno tiene foto en la BD, mostrar, si no, mostrar iniciales --}}
            <div class="profile-avatar-box" id="avatarPreviewContainer">AG</div>

            <div class="profile-header-info">
                {{-- [PHP/BD]: Nombre completo desde la BD --}}
                <h1>Ana García López</h1>

                {{-- [PHP/BD]: Matrícula desde la BD --}}
                <p class="profile-matricula">ISC-2024-0312</p>

                <div class="profile-header-badges">
                    {{-- [PHP/BD]: Semestre y estado --}}
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
            {{-- [PHP/BD]: Formulario POST que envía el archivo a un controlador Laravel (ej: route('perfil.avatar')) con enctype="multipart/form-data" --}}
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
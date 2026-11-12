@extends('Alumno')

@section('title', 'Mis materias')
@section('page-title', 'Mis materias')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/materias_Alu.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/materias_Alu.js') }}" defer></script>
@endpush

@section('content')

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

@endsection
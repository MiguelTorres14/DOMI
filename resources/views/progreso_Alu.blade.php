@extends('Alumno')

@section('title', 'Mi progreso')
@section('page-title', 'Mi progreso')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/progreso_Alu.css') }}">
@endpush

@push('scripts')
    {{-- Librería Chart.js para dibujar la gráfica de evolución --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/progreso_Alu.js') }}" defer></script>
@endpush

@section('content')

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

    <!-- Fila 3: Avance por materia -->
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

@endsection
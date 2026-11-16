@extends('Alumno')

@section('title', 'Mi progreso')
@section('page-title', 'Mi progreso')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/progreso_Alu.css') }}">
@endpush

@section('content')

    @php
        $materiasConsultadas = \App\Models\Subject::where('school_id', Auth::user()->school_id)->count();
        $temasEstudiados = \App\Models\TopicProgress::where('user_id', Auth::id())->whereIn('status', ['completed', 'unlocked'])->count();
        $cuestionariosCompletados = Auth::user()->attempts()->where('passed', true)->count();
        $totalTemasEnSistema = \App\Models\Topic::whereHas('unit.subject', function($q) {
            $q->where('school_id', Auth::user()->school_id);
        })->count();
        $cuestionariosPendientes = $totalTemasEnSistema - $cuestionariosCompletados;
    @endphp

    <div class="section-header">
        <h2>Mi progreso</h2>
        <p>Seguimiento de tus actividades dentro de DOMI</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon icon-blue">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
            </div>
            <h3 class="stat-value">{{ $materiasConsultadas }}</h3>
            <p class="stat-label">Materias consultadas</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon icon-purple">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            </div>
            <h3 class="stat-value">{{ $temasEstudiados }}</h3>
            <p class="stat-label">Temas estudiados</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon icon-green">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <h3 class="stat-value">{{ $cuestionariosCompletados }}</h3>
            <p class="stat-label">Cuestionarios completados</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon icon-yellow">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <h3 class="stat-value">{{ $cuestionariosPendientes > 0 ? $cuestionariosPendientes : 0 }}</h3>
            <p class="stat-label">Cuestionarios pendientes</p>
        </div>
    </div>

    <div class="chart-container">
        <div class="chart-header">
            <h3>Evolución del rendimiento en cuestionarios</h3>
            <p>Puntaje de tus últimos intentos (%)</p>
        </div>
        <div class="canvas-wrapper" style="position: relative; height: 300px; width: 100%;">
            <canvas id="rendimientoChart"></canvas>
        </div>
    </div>

    <div class="course-progress-container">
        <h3>Avance por materia</h3>

        @foreach(\App\Models\Subject::where('school_id', Auth::user()->school_id)->get() as $materia)
            @php
                $totalTemas = 0;
                foreach($materia->units as $unidad) {
                    $totalTemas += $unidad->topics->count();
                }
                $temasCompletados = \App\Models\TopicProgress::where('user_id', Auth::id())
                    ->where('status', 'completed')
                    ->whereHas('topic.unit', function($q) use ($materia) {
                        $q->where('subject_id', $materia->id);
                    })->count();
                $porcentaje = $totalTemas > 0 ? round(($temasCompletados / $totalTemas) * 100) : 0;
            @endphp

            <div class="course-progress-item">
                <div class="course-progress-info">
                    <div class="course-name-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                        <h4>{{ $materia->name }}</h4>
                    </div>
                    <span class="course-percent">{{ $temasCompletados }}/{{ $totalTemas }} <strong class="text-blue">{{ $porcentaje }}%</strong></span>
                </div>
                <div class="progress-bar-bg">
                    <div class="progress-bar-fill bg-blue" style="width: {{ $porcentaje }}%;"></div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('rendimientoChart').getContext('2d');
            
            // Variables de PHP a JS
            const fechas = @json($fechas);
            const puntajes = @json($puntajes);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: fechas.length > 0 ? fechas : ['Sin datos aún'],
                    datasets: [{
                        label: 'Calificación (%)',
                        data: puntajes.length > 0 ? puntajes : [0],
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        borderWidth: 3,
                        pointBackgroundColor: '#1e3a8a',
                        fill: true,
                        tension: 0.4 // Curva suave
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { 
                            beginAtZero: true, 
                            max: 100,
                            ticks: { callback: function(value) { return value + '%' } }
                        }
                    },
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        });
    </script>
@endpush
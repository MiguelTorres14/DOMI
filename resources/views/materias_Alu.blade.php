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
            <span class="career">Ingeniería en Sistemas Computacionales</span>
            <span class="semester">{{ Auth::user()->semester }}° Semestre</span>
        </div>
    </div>

    <!-- Cuadrícula de tarjetas de materias -->
    <div class="subjects-grid">

        @forelse($materias as $materia)
            @php
                // Cálculo del progreso real por materia
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

            <div class="subject-card border-blue">
                <div class="card-content">
                    <div class="subject-icon-box icon-blue">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="16 18 22 12 16 6"/>
                            <polyline points="8 6 2 12 8 18"/>
                        </svg>
                    </div>
                    <div class="subject-details">
                        <h3>{{ $materia->name }}</h3>
                        <p>{{ $materia->description ?? 'Sin descripción disponible.' }}</p>
                    </div>
                </div>

                <div class="subject-stats">
                    <span class="stat-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        {{ $materia->units->count() }} unidades
                    </span>
                    <span class="stat-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        {{ $temasCompletados }} / {{ $totalTemas }} temas
                    </span>
                </div>

                <div class="progress-section">
                    <div class="progress-labels">
                        <span>Progreso</span>
                        <span class="progress-percent text-blue">{{ $porcentaje }}%</span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-bar-fill bg-blue" style="width: {{ $porcentaje }}%;"></div>
                    </div>
                </div>

                <a href="{{ url('/alumno/materia/detalle/' . $materia->id) }}" class="btn-subject bg-blue">Ver materia</a>
            </div>
        @empty
            <div class="empty-state">
                <p>Aún no tienes materias asignadas.</p>
            </div>
        @endforelse

    </div>

@endsection
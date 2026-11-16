@extends('Alumno')

@section('title', $materia->name)
@section('page-title', 'Detalle de materia')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/materia_detalle_Alu.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/materia_detalle_Alu.js') }}" defer></script>
@endpush

@section('content')

@if(session('mensaje'))
    <div style="background: #dbeafe; color: #1e40af; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-weight: bold;">
        {{ session('mensaje') }}
    </div>
@endif

    <!-- Botón Volver y Título -->
    <div class="course-header">
        <a href="{{ url('/alumno/materias') }}" class="btn-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Volver a materias
        </a>

        <div class="course-title-box">
            <div class="course-icon text-blue">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
            <div>
                <h1>{{ $materia->name }}</h1>
                <p>{{ $materia->description ?? 'Sin descripción disponible.' }}</p>
            </div>
        </div>
    </div>

    <!-- Menú de Pestañas (Tabs) -->
    <div class="tabs-container">
        <button class="tab-btn active" data-tab="materiales">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
            Materiales de DOMI
        </button>
        <button class="tab-btn" data-tab="archivos">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
            Mis archivos
        </button>
        <button class="tab-btn" data-tab="cuestionarios">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            Cuestionarios
        </button>
    </div>

    <!-- Contenido de las Pestañas -->
    <div class="tab-content-area">

        <!-- TAB 1: Materiales de DOMI -->
        <div id="materiales" class="tab-pane active">
            
            @forelse($materia->units as $unidad)
                <div class="accordion-item {{ $loop->first ? '' : 'collapsed' }}">
                    <button class="accordion-header">
                        <span class="unit-title">{{ $unidad->name }}</span>
                        <span class="unit-meta">{{ $unidad->topics->count() }} temas <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg></span>
                    </button>
                    <div class="accordion-body" @if(!$loop->first) style="display: none;" @endif>
                        
                        @foreach($unidad->topics as $tema)
                            <div class="document-item">
                                <div class="doc-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                </div>
                                <div class="doc-info">
                                    <h4>{{ $tema->name }}</h4>
                                    <p>Contenido de la lección y material de apoyo</p>
                                    <div class="doc-tags">
                                        <span class="tag-type pdf">Tema</span>
                                    </div>
                                </div>
                                <!-- Aquí podrías poner un botón para ir a la lección -->
                                <a href="#" class="btn-download">Ver</a>
                            </div>
                        @endforeach

                    </div>
                </div>
            @empty
                <p>No hay unidades registradas para esta materia.</p>
            @endforelse

        </div>


        <!-- TAB 2: Mis archivos (Se queda igual, solo es diseño) -->
        <div id="archivos" class="tab-pane">
            <div class="upload-zone">
                <form action="#" method="POST" enctype="multipart/form-data" class="upload-box">
                    @csrf
                    <div class="upload-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                    </div>
                    <p class="upload-text">Arrastra tus archivos aquí</p>
                    <p class="upload-sub">Formatos admitidos: PDF, DOCX, PPTX, TXT</p>
                    <label class="btn-primary-blue mt-4">
                        + Subir archivo
                        <input type="file" name="archivo" style="display: none;">
                    </label>
                </form>
            </div>
        </div>


        <!-- TAB 3: Cuestionarios -->
        <div id="cuestionarios" class="tab-pane">
            <div class="quiz-list">
                
                @foreach($materia->units as $unidad)
                    @foreach($unidad->topics as $tema)
                        <!-- Buscamos el progreso de este tema en específico -->
                        @php
                            $miProgreso = $progreso->where('topic_id', $tema->id)->first();
                            $estado = $miProgreso ? $miProgreso->status : 'locked';
                        @endphp

                        <div class="quiz-item {{ $estado === 'locked' ? 'opacity-50' : '' }}">
                            <div class="quiz-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="{{ $estado === 'locked' ? '#94a3b8' : '#2563eb' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <div class="quiz-info">
                                <div class="quiz-title-row">
                                    <h4>{{ $tema->name }}</h4>
                                    @if($estado === 'completed')
                                        <span class="badge-level" style="background: #dcfce7; color: #166534;">Completado</span>
                                    @elseif($estado === 'unlocked')
                                        <span class="badge-level basic">Disponible</span>
                                    @else
                                        <span class="badge-level" style="background: #f1f5f9; color: #64748b;">Bloqueado</span>
                                    @endif
                                </div>
                                <p>{{ $tema->questions->count() }} preguntas</p>
                            </div>
                            
                            <!-- AQUI ESTAN LOS BOTONES CORREGIDOS -->
                            @if($estado === 'unlocked')
                                <a href="{{ url('/alumno/examen/' . $tema->id) }}" class="btn-primary-blue quiz-btn">&gt; Comenzar</a>
                            @elseif($estado === 'completed')
                                <a href="{{ url('/alumno/examen/' . $tema->id) }}" class="btn-primary-blue quiz-btn" style="background: #10b981;">&gt; Repetir</a>
                            @else
                                <button class="btn-secondary quiz-btn" disabled>&gt; Bloqueado</button>
                            @endif
                        </div>
                    @endforeach
                @endforeach

            </div>
        </div>

    </div>

@endsection
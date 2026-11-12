@extends('Alumno')

{{-- [PHP/BD]: @section('title', $materia->nombre) --}}
@section('title', 'Fundamentos de Programación')
@section('page-title', 'Detalle de materia')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/materia_detalle_Alu.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/materia_detalle_Alu.js') }}" defer></script>
@endpush

@section('content')

    <!-- Botón Volver y Título -->
    <div class="course-header">
        <a href="{{ url('/materias') }}" class="btn-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Volver a materias
        </a>

        <div class="course-title-box">
            <div class="course-icon text-blue">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
            <div>
                {{-- [PHP/BD]: {{ $materia->nombre }} --}}
                <h1>Fundamentos de Programación</h1>

                {{-- [PHP/BD]: {{ $materia->descripcion }} --}}
                <p>Algoritmos, estructuras de control y paradigmas básicos de programación</p>
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
            {{-- [PHP/BD]: @foreach($materia->unidades as $unidad) ... --}}

            <!-- Acordeón Unidad 1 -->
            <div class="accordion-item">
                <button class="accordion-header">
                    <span class="unit-title">Unidad 1: Algoritmos y Pseudocódigo</span>
                    <span class="unit-meta">2 documentos <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg></span>
                </button>
                <div class="accordion-body">

                    {{-- [PHP/BD]: @foreach($unidad->documentos as $doc) ... --}}
                    <div class="document-item">
                        <div class="doc-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
                        <div class="doc-info">
                            <h4>Introducción a los Algoritmos.pdf</h4>
                            <p>Definición, características y representación gráfica de algoritmos</p>
                            <div class="doc-tags">
                                <span class="tag-type pdf">PDF</span>
                                <span class="tag-size">2.4 MB</span>
                            </div>
                        </div>
                        <a href="#" class="btn-download"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg> Ver</a>
                    </div>

                    <div class="document-item">
                        <div class="doc-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
                        <div class="doc-info">
                            <h4>Diagramas de Flujo.pptx</h4>
                            <p>Simbología estándar y construcción de diagramas de flujo</p>
                            <div class="doc-tags">
                                <span class="tag-type pptx">PPTX</span>
                                <span class="tag-size">5.1 MB</span>
                            </div>
                        </div>
                        <a href="#" class="btn-download"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg> Ver</a>
                    </div>
                    {{-- [PHP/BD]: @endforeach --}}

                </div>
            </div>

            <!-- Acordeón Unidad 2 -->
            <div class="accordion-item collapsed">
                <button class="accordion-header">
                    <span class="unit-title">Unidad 2: Variables y Tipos de Datos</span>
                    <span class="unit-meta">2 documentos <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                </button>
                <div class="accordion-body" style="display: none;">
                    <!-- Documentos Unidad 2 -->
                </div>
            </div>

            {{-- [PHP/BD]: @endforeach --}}
        </div>


        <!-- TAB 2: Mis archivos -->
        <div id="archivos" class="tab-pane">
            <div class="upload-zone">
                {{-- [PHP/BD]: Formulario POST para subir archivos (enctype="multipart/form-data") --}}
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

            <!-- Lista de archivos subidos -->
            <div class="empty-state">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                <p>Aún no has subido archivos para esta materia</p>
            </div>

            <!-- Próximamente -->
            <div class="feature-banner">
                <div class="feature-content">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d946ef" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    <div>
                        <h5>Generar cuestionario desde mis archivos</h5>
                        <p>Esta función estará disponible próximamente</p>
                    </div>
                </div>
                <span class="badge-soon">Próximamente</span>
            </div>
        </div>


        <!-- TAB 3: Cuestionarios -->
        <div id="cuestionarios" class="tab-pane">
            <div class="quiz-list">
                {{-- [PHP/BD]: @foreach($materia->cuestionarios as $quiz) ... --}}

                <!-- Cuestionario 1 -->
                <div class="quiz-item">
                    <div class="quiz-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <div class="quiz-info">
                        <div class="quiz-title-row">
                            <h4>Algoritmos y Estructuras de Control</h4>
                            <span class="badge-level basic">Básico</span>
                        </div>
                        <p>5 preguntas · Pendiente</p>
                    </div>
                    <a href="#" class="btn-primary-blue quiz-btn">&gt; Comenzar</a>
                </div>

                <!-- Cuestionario 2 -->
                <div class="quiz-item">
                    <div class="quiz-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <div class="quiz-info">
                        <div class="quiz-title-row">
                            <h4>Variables, Datos y Operadores</h4>
                            <span class="badge-level basic">Básico</span>
                        </div>
                        <p>4 preguntas · Pendiente</p>
                    </div>
                    <a href="#" class="btn-primary-blue quiz-btn">&gt; Comenzar</a>
                </div>

                {{-- [PHP/BD]: @endforeach --}}
            </div>
        </div>

    </div>

@endsection
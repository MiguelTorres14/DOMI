@extends('Alumno')

@section('title', 'Recompensas')
@section('page-title', 'Recompensas')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/recompensas_Alu.css') }}">
@endpush

@section('content')

    <!-- Banner principal -->
    <section class="rewards-banner">
        <div class="rewards-banner-text">
            <h1>
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="6"/>
                    <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
                </svg>
                ¡Tu esfuerzo tiene recompensa!
            </h1>
            <p>Aprende, practica y supera tus cuestionarios para desbloquear beneficios por dedicación.</p>

            <div class="rewards-badges">
                {{-- [PHP/BD]: {{ $alumno->cuestionarios_completados }} --}}
                <span class="rewards-badge">0 cuestionarios completados</span>
                {{-- [PHP/BD]: {{ $alumno->cuestionarios_80 }} --}}
                <span class="rewards-badge">0 con puntaje ≥80%</span>
            </div>
        </div>

        <div class="rewards-watermark">
            <svg width="110" height="110" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="8" r="6"/>
                <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
            </svg>
        </div>
    </section>

    <!-- Progreso hacia la próxima recompensa -->
    <section class="next-reward-card">
        <h3>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 8h1a4 4 0 0 1 0 8h-1"/>
                <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4z"/>
                <line x1="6" y1="2" x2="6" y2="4"/>
                <line x1="10" y1="2" x2="10" y2="4"/>
                <line x1="14" y1="2" x2="14" y2="4"/>
            </svg>
            Progreso hacia tu próxima recompensa
        </h3>

        {{-- [PHP/BD]: {{ $proxima->nombre }}: necesitas {{ $proxima->faltantes }} cuestionario(s) más con ≥80% de aciertos --}}
        <p class="next-reward-text">Descuento en Cafetería: necesitas 3 cuestionario(s) más con ≥80% de aciertos</p>

        <div class="reward-progress-bg">
            {{-- [PHP/BD]: style="width: {{ $proxima->porcentaje }}%;" --}}
            <div class="reward-progress-fill" style="width: 0%;"></div>
        </div>

        <div class="reward-progress-labels">
            {{-- [PHP/BD]: {{ $proxima->avance }}/{{ $proxima->requeridos }} cuestionarios con ≥80% --}}
            <span>0/3 cuestionarios con ≥80%</span>
            {{-- [PHP/BD]: {{ $proxima->porcentaje }}% --}}
            <strong>0%</strong>
        </div>
    </section>

    <!-- Cuadrícula de recompensas -->
    <section class="rewards-grid">

        {{-- [PHP/BD]: @foreach($recompensas as $recompensa) ... --}}

        <!-- Recompensa 1: Descuento en Cafetería -->
        <article class="reward-card">
            <div class="reward-card-top">
                <div class="reward-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 8h1a4 4 0 0 1 0 8h-1"/>
                        <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4z"/>
                        <line x1="6" y1="2" x2="6" y2="4"/>
                        <line x1="10" y1="2" x2="10" y2="4"/>
                        <line x1="14" y1="2" x2="14" y2="4"/>
                    </svg>
                </div>
                <div class="reward-info">
                    <div class="reward-title-row">
                        {{-- [PHP/BD]: {{ $recompensa->nombre }} --}}
                        <h4>Descuento en Cafetería</h4>
                        {{-- [PHP/BD]: estado: Bloqueado / Disponible / Canjeado --}}
                        <span class="reward-status locked">Bloqueado</span>
                    </div>
                    {{-- [PHP/BD]: {{ $recompensa->descripcion }} --}}
                    <p>10% de descuento en cualquier compra de la cafetería institucional</p>
                </div>
            </div>

            <div class="reward-value">
                <span class="value-big text-orange">10% OFF</span>
                <span class="value-small">en la cafetería</span>
            </div>

            <p class="reward-meta"><strong>Requisito:</strong> Obtener ≥80% en 3 cuestionarios de DOMI</p>

            {{-- [PHP/BD]: si está desbloqueada, cambiar a <a> o <button> activo (class="reward-btn unlocked") --}}
            <button type="button" class="reward-btn" disabled>Completa más cuestionarios para desbloquear</button>
        </article>

        <!-- Recompensa 2: Décima Adicional -->
        <article class="reward-card">
            <div class="reward-card-top">
                <div class="reward-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                </div>
                <div class="reward-info">
                    <div class="reward-title-row">
                        <h4>Décima Adicional</h4>
                        <span class="reward-status locked">Bloqueado</span>
                    </div>
                    <p>Posible décima adicional en Fundamentos de Programación, sujeta a autorización docente</p>
                </div>
            </div>

            <div class="reward-value">
                <span class="value-big text-purple">+0.1 pts</span>
                <span class="value-small">en la materia</span>
            </div>

            <p class="reward-meta"><strong>Requisito:</strong> ≥85% en ambos cuestionarios de Fundamentos de Programación</p>
            {{-- [PHP/BD]: {{ $recompensa->docente->nombre }} --}}
            <p class="reward-meta"><strong>Docente:</strong> Dr. Roberto Sánchez Vargas</p>

            <button type="button" class="reward-btn" disabled>Completa los cuestionarios para desbloquear</button>
        </article>

        {{-- [PHP/BD]: @endforeach --}}

    </section>

@endsection
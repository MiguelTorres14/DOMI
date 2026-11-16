@extends('Alumno')

@section('title', 'Examen: ' . $tema->name)
@section('page-title', 'Realizando Examen')

@push('styles')
    <!-- Si tienes un CSS específico para esto, lo pones aquí, si no, déjalo así -->
@endpush

@section('content')
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        
        <div style="border-bottom: 2px solid #e2e8f0; padding-bottom: 20px; margin-bottom: 20px;">
            <h2 style="margin: 0; color: #1e3a8a;">{{ $tema->name }}</h2>
            <p style="color: #64748b; margin-top: 5px;">Responde todas las preguntas. Necesitas al menos 60% para aprobar.</p>
        </div>

        <!-- Formulario que envía las respuestas -->
        <form action="{{ url('/alumno/examen/' . $tema->id) }}" method="POST">
            @csrf

            @foreach($tema->questions as $index => $pregunta)
                <div style="margin-bottom: 30px;">
                    <h3 style="font-size: 1.1rem; margin-bottom: 15px;">{{ $index + 1 }}. {{ $pregunta->question_text }}</h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        @foreach($pregunta->options as $opcion)
                            <label style="display: flex; align-items: center; gap: 10px; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; cursor: pointer; transition: 0.2s;">
                                <input type="radio" name="pregunta_{{ $pregunta->id }}" value="{{ $opcion->id }}" required style="transform: scale(1.2);">
                                <span>{{ $opcion->option_text }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div style="text-align: right; border-top: 2px solid #e2e8f0; padding-top: 20px;">
                <a href="{{ url('/alumno/materia/detalle/' . $tema->unit->subject_id) }}" style="color: #64748b; text-decoration: none; margin-right: 15px;">Cancelar</a>
                <button type="submit" style="background: #2563eb; color: white; padding: 12px 25px; border: none; border-radius: 8px; font-weight: bold; font-size: 1rem; cursor: pointer;">
                    Enviar mis respuestas
                </button>
            </div>
        </form>

    </div>
@endsection
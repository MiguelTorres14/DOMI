@extends('Admin')

@section('title', 'Preguntas')
@section('page-title', 'Preguntas del Tema')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="javascript:history.back()" style="color: #2563eb; text-decoration: none; font-weight: 600;">← Volver a Unidades</a>
        <h2 style="margin-top: 15px;">{{ $tema->name }}</h2>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        
        <!-- Formulario de Pregunta -->
        <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h3 style="margin-top: 0;">Agregar Nueva Pregunta</h3>
            <form action="{{ route('admin.questions.store', $tema->id) }}" method="POST">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px;">Pregunta</label>
                    <input type="text" name="question_text" placeholder="Escribe la pregunta aquí..." required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px; box-sizing: border-box;">
                </div>

                <label style="display: block; font-weight: 600; margin-bottom: 10px;">Opciones (Marca la correcta)</label>
                
                @for($i = 0; $i < 4; $i++)
                    @php
                        $esRequeridoRadio = $i == 0 ? 'required' : '';
                        $esRequeridoInput = $i < 2 ? 'required' : '';
                        $numOpcion = $i + 1;
                    @endphp
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <input type="radio" name="correct_option" value="{{ $i }}" {{ $esRequeridoRadio }} style="transform: scale(1.5); cursor: pointer;">
                        <input type="text" name="options[]" placeholder="Opción {{ $numOpcion }}" {{ $esRequeridoInput }} style="flex: 1; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;">
                    </div>
                @endfor

                <button type="submit" style="background: #10b981; color: white; padding: 12px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; width: 100%; margin-top: 10px;">Guardar Pregunta</button>
            </form>
        </div>

        <!-- Lista de Preguntas -->
        <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h3 style="margin-top: 0;">Preguntas Actuales</h3>
            @forelse($tema->questions as $index => $pregunta)
                <div style="border-bottom: 1px solid #e2e8f0; padding-bottom: 15px; margin-bottom: 15px; display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <h4 style="margin: 0 0 10px 0;">{{ $index + 1 }}. {{ $pregunta->question_text }}</h4>
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($pregunta->options as $opcion)
                                @php
                                    $colorTexto = $opcion->is_correct ? '#166534' : '#475569';
                                    $grosorTexto = $opcion->is_correct ? 'bold' : 'normal';
                                    $iconoCheck = $opcion->is_correct ? '✅' : '';
                                @endphp
                                <li style="color: {{ $colorTexto }}; font-weight: {{ $grosorTexto }}; margin-bottom: 5px;">
                                    {{ $opcion->option_text }} {!! $iconoCheck !!}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- BOTÓN DE ELIMINAR PREGUNTA -->
                    <form action="{{ route('admin.questions.destroy', $pregunta->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta pregunta?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: #fecaca; color: #ef4444; border: none; width: 30px; height: 30px; border-radius: 50%; cursor: pointer; font-weight: bold; display: flex; align-items: center; justify-content: center;">×</button>
                    </form>
                </div>
            @empty
                <p style="color: #64748b; font-style: italic;">No hay preguntas registradas aún.</p>
            @endforelse
        </div>
    </div>
@endsection
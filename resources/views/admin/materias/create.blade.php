@extends('Admin')

@section('title', 'Crear Materia')
@section('page-title', 'Registrar Nueva Materia')

@section('content')
    <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); max-width: 600px;">
        
        @if ($errors->any())
            <div style="color: #991b1b; background: #fee2e2; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.materias.store') }}" method="POST">
            @csrf
            
            <!-- Campo Nombre -->
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; font-weight: 600; margin-bottom: 8px;">Nombre de la Materia</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Ej: Programación Web" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; box-sizing: border-box;">
            </div>

            <!-- NUEVO: Campo Semestre -->
            <div style="margin-bottom: 20px;">
                <label for="semester" style="display: block; font-weight: 600; margin-bottom: 8px;">Semestre al que pertenece</label>
                <select id="semester" name="semester" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; box-sizing: border-box; background: white;">
                    <option value="">Selecciona el semestre</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>{{ $i }}° Semestre</option>
                    @endfor
                </select>
            </div>

            <!-- Campo Descripción -->
            <div style="margin-bottom: 20px;">
                <label for="description" style="display: block; font-weight: 600; margin-bottom: 8px;">Descripción (Opcional)</label>
                <textarea id="description" name="description" rows="4" placeholder="Describe brevemente de qué trata la materia..." style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; box-sizing: border-box;">{{ old('description') }}</textarea>
            </div>

            <!-- Botones -->
            <div style="display: flex; gap: 10px;">
                <button type="submit" style="background: #2563eb; color: white; padding: 12px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">Guardar Materia</button>
                <a href="{{ route('admin.materias.index') }}" style="background: #f1f5f9; color: #475569; padding: 12px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
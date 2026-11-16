@extends('Admin')

@section('title', 'Unidades')
@section('page-title', 'Unidades de ' . $materia->name)

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.materias.index') }}" style="color: #2563eb; text-decoration: none; font-weight: 600;">← Volver a Materias</a>
    </div>

    <!-- Formulario para agregar Unidad -->
    <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 30px;">
        <h3 style="margin-top: 0;">Agregar Nueva Unidad</h3>
        <form action="{{ route('admin.units.store', $materia->id) }}" method="POST" style="display: flex; gap: 10px;">
            @csrf
            <input type="text" name="name" placeholder="Ej: Unidad 1: Introducción" required style="flex: 1; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px;">
            <button type="submit" style="background: #2563eb; color: white; padding: 12px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">+ Agregar</button>
        </form>
    </div>

    <!-- Lista de Unidades -->
    @foreach($materia->units as $unidad)
        <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px; margin-bottom: 15px;">
                <h2 style="margin: 0;">{{ $unidad->name }}</h2>
                
                <!-- BOTÓN DE ELIMINAR UNIDAD -->
                <form action="{{ route('admin.units.destroy', $unidad->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta unidad entera?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: #fecaca; color: #ef4444; padding: 6px 12px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">Eliminar Unidad</button>
                </form>
            </div>
            
            <form action="{{ route('admin.topics.store', $unidad->id) }}" method="POST" style="display: flex; gap: 10px; margin-bottom: 20px;">
                @csrf
                <input type="text" name="name" placeholder="Ej: Tema 1: ¿Qué es HTML?" required style="flex: 1; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;">
                <button type="submit" style="background: #f59e0b; color: white; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">+ Agregar Tema</button>
            </form>

            <div style="padding-left: 20px; border-left: 3px solid #e2e8f0;">
                @forelse($unidad->topics as $tema)
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px dashed #e2e8f0;">
                        <span style="font-weight: 600;">📚 {{ $tema->name }}</span>
                        
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <a href="{{ route('admin.questions.index', $tema->id) }}" style="color: #2563eb; text-decoration: none; font-weight: 600; font-size: 0.9rem;">Gestionar Preguntas →</a>
                            
                            <!-- BOTÓN DE ELIMINAR TEMA -->
                            <form action="{{ route('admin.topics.destroy', $tema->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este tema?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-weight: bold; font-size: 1.2rem;">×</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p style="color: #64748b; font-style: italic;">No hay temas en esta unidad.</p>
                @endforelse
            </div>
        </div>
    @endforeach
@endsection
@extends('Admin')

@section('title', 'Materias')
@section('page-title', 'Gestión de Materias')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.materias.create') }}" class="card-btn btn-outline-blue" style="display: inline-block; text-decoration: none;">+ Nueva Materia</a>
    </div>

    <div style="background: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                <tr>
                    <th style="padding: 15px; color: #64748b; font-weight: 600;">Semestre</th>
                    <th style="padding: 15px; color: #64748b; font-weight: 600;">Nombre</th>
                    <th style="padding: 15px; color: #64748b; font-weight: 600;">Descripción</th>
                    <th style="padding: 15px; text-align: right; color: #64748b; font-weight: 600;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materias as $materia)
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 15px;">
                            <span style="background: #e0f2fe; color: #0369a1; padding: 4px 12px; border-radius: 999px; font-size: 0.85rem; font-weight: 600;">
                                {{ $materia->semester }}° Semestre
                            </span>
                        </td>
                        <td style="padding: 15px; font-weight: 600; color: #0f172a;">{{ $materia->name }}</td>
                        <td style="padding: 15px; color: #64748b;">{{ $materia->description ?? 'Sin descripción' }}</td>
                        <td style="padding: 15px; text-align: right;">
                            <a href="{{ route('admin.units.index', $materia->id) }}" style="background: #10b981; color: white; padding: 8px 15px; text-decoration: none; border-radius: 6px; font-size: 0.9rem; font-weight: 600; margin-right: 5px;">Gestionar Unidades</a>
                            
                            <!-- BOTÓN DE ELIMINAR -->
                            <form action="{{ route('admin.materias.destroy', $materia->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Eliminar materia?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #ef4444; color: white; padding: 8px 15px; border: none; border-radius: 6px; font-size: 0.9rem; font-weight: 600; cursor: pointer;">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding: 30px; text-align: center; color: #64748b;">
                            No hay materias registradas para esta escuela.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
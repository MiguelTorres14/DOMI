@extends('Admin')

@section('title', 'Alumnos')
@section('page-title', 'Gestión de Alumnos')

@section('content')
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                <tr>
                    <th style="padding: 15px; color: #64748b;">Nombre</th>
                    <th style="padding: 15px; color: #64748b;">Correo</th>
                    <th style="padding: 15px; color: #64748b;">Puntos</th>
                    <th style="padding: 15px; color: #64748b;">Semestre Actual</th>
                    <th style="padding: 15px; text-align: right; color: #64748b;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alumnos as $alumno)
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 15px; font-weight: 600;">{{ $alumno->name }}</td>
                        <td style="padding: 15px; color: #64748b;">{{ $alumno->email }}</td>
                        <td style="padding: 15px; font-weight: bold; color: #2563eb;">{{ $alumno->points }} pts</td>
                        <td style="padding: 15px;">
                            <span style="background: #e0f2fe; color: #0369a1; padding: 4px 12px; border-radius: 999px; font-size: 0.85rem; font-weight: 600;">
                                {{ $alumno->semester }}° Semestre
                            </span>
                        </td>
                        <td style="padding: 15px; text-align: right; display: flex; justify-content: flex-end; gap: 10px;">
                            
                            <!-- Formulario para cambiar semestre -->
                            <form action="{{ route('admin.usuarios.update-semester', $alumno->id) }}" method="POST" style="display: flex; gap: 5px;">
                                @csrf
                                @method('PUT')
                                <select name="semester" style="padding: 6px; border-radius: 6px; border: 1px solid #cbd5e1;">
                                    @for($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ $alumno->semester == $i ? 'selected' : '' }}>{{ $i }}°</option>
                                    @endfor
                                </select>
                                <button type="submit" style="background: #f59e0b; color: white; padding: 6px 12px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">Cambiar</button>
                            </form>

                            <!-- BOTÓN DE ELIMINAR ALUMNO (Opcional, pero útil) -->
                            <form action="{{ route('admin.usuarios.destroy', $alumno->id) }}" method="POST" onsubmit="return confirm('¿Eliminar a este alumno? Ya no podrá acceder.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #ef4444; color: white; padding: 8px 12px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; height: 100%;">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 30px; text-align: center; color: #64748b;">No hay alumnos registrados en tu institución.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
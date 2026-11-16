@extends('Admin')

@section('title', 'Dashboard')
@section('page-title', 'Resumen General')

@section('content')
    <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 20px;">
        <h2 style="margin-top: 0;">Panel de Administración DOMI</h2>
        <p style="color: #64748b;">Bienvenido, {{ Auth::user()->name }}. Desde aquí puedes gestionar todo el contenido de la plataforma.</p>
    </div>

    <div style="display: flex; gap: 20px;">
        <div style="flex: 1; background: white; padding: 20px; border-radius: 12px; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h3 style="color: #64748b; margin-top: 0;">Materias Registradas</h3>
            <h1 style="color: #2563eb; font-size: 3rem; margin: 0;">{{ $totalMaterias }}</h1>
        </div>
        <div style="flex: 1; background: white; padding: 20px; border-radius: 12px; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h3 style="color: #64748b; margin-top: 0;">Alumnos Activos</h3>
            <h1 style="color: #10b981; font-size: 3rem; margin: 0;">{{ $totalAlumnos }}</h1>
        </div>
    </div>
@endsection
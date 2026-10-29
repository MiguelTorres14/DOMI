<?php

use Illuminate\Support\Facades\Route;

// Rutas de inicio y login
Route::view('/', 'login');
Route::view('/login', 'login');

// Ruta para ver tu interfaz de perfil del alumno
Route::view('/inicio_Alu', 'inicio_Alu');
Route::view('/perfil', 'perfil_Alu');
Route::view('/materias', 'materias_Alu');
Route::view('/materia/detalle', 'materia_detalle_Alu');
Route::view('/progreso', 'progreso_Alu');
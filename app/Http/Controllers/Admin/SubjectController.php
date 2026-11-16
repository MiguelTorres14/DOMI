<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth; // <-- IMPORTANTE: Agregado para usar Auth

class SubjectController extends Controller
{
    // 1. Mostrar la lista de materias
    public function index()
    {
        // Filtra las materias por la escuela del admin logueado
        $materias = Subject::where('school_id', Auth::user()->school_id)->get();
        return view('admin.materias.index', compact('materias'));
    }

    // 2. Mostrar el formulario de creación
    public function create()
    {
        return view('admin.materias.create');
    }

    // 3. Guardar la nueva materia en la BD
    public function store(Request $request)
    {
        // Validamos los datos (agregamos el semestre)
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'semester' => 'required|integer|min:1|max:12' // <-- NUEVO
        ]);

        // Creamos la materia asignándole la escuela del admin
        Subject::create([
            'name' => $request->name,
            'description' => $request->description,
            'semester' => $request->semester, // <-- NUEVO
            'school_id' => Auth::user()->school_id, // <-- NUEVO: Se liga a la escuela
        ]);

        return redirect()->route('admin.materias.index')->with('success', 'Materia creada exitosamente.');
    }

        public function destroy($id)
    {
        $materia = Subject::where('school_id', Auth::user()->school_id)->findOrFail($id);
        $materia->delete();
        return back()->with('success', 'Materia eliminada correctamente.');
    }
}
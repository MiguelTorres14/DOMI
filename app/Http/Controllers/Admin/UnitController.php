<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index($subject_id)
    {
        $materia = Subject::with('units.topics')->findOrFail($subject_id);
        return view('admin.units.index', compact('materia'));
    }

    public function store(Request $request, $subject_id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        
        Unit::create([
            'subject_id' => $subject_id,
            'name' => $request->name,
            'order' => Unit::where('subject_id', $subject_id)->count() + 1
        ]);

        return back()->with('success', 'Unidad agregada correctamente.');
    }

        public function destroy($id)
    {
        $unidad = Unit::findOrFail($id);
        // Validar que la unidad pertenezca a una materia de su escuela
        if ($unidad->subject->school_id !== Auth::user()->school_id) abort(403);
        
        $unidad->delete();
        return back()->with('success', 'Unidad eliminada correctamente.');
    }
}
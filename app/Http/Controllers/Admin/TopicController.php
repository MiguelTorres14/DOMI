<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Unit;
use App\Models\TopicProgress;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function store(Request $request, $unit_id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        
        $unidad = Unit::findOrFail($unit_id);
        
        $tema = Topic::create([
            'unit_id' => $unit_id,
            'name' => $request->name,
            'order' => Topic::where('unit_id', $unit_id)->count() + 1,
            'points_reward' => 20 // Puntos por defecto
        ]);

        // Lógica: Desbloquear este tema para todos los alumnos existentes
        // (Para que no tengan que empezar de cero si ya están en el sistema)
        $alumnos = User::where('role', 'student')->get();
        foreach ($alumnos as $alumno) {
            TopicProgress::firstOrCreate([
                'user_id' => $alumno->id,
                'topic_id' => $tema->id,
            ], [
                'status' => 'unlocked', // O 'locked' si quieres que lo desbloqueen secuencialmente
                'stars' => 0,
                'best_score' => 0
            ]);
        }

        return back()->with('success', 'Tema agregado correctamente.');
    }

        public function destroy($id)
    {
        $tema = Topic::findOrFail($id);
        if ($tema->unit->subject->school_id !== Auth::user()->school_id) abort(403);
        
        $tema->delete();
        return back()->with('success', 'Tema eliminado correctamente.');
    }
}
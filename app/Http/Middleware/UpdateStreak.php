<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UpdateStreak
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'student') {
            
            /** @var \App\Models\User $user */ // <-- AGREGAR ESTA LÍNEA
            $user = Auth::user();
            
            $hoy = Carbon::today();
            $ultimaConexion = $user->last_activity_date ? Carbon::parse($user->last_activity_date) : null;

            if (!$ultimaConexion || $ultimaConexion->diffInDays($hoy) >= 1) {
                if ($ultimaConexion && $ultimaConexion->diffInDays($hoy) == 1) {
                    // Entró al día siguiente: sumamos racha
                    $user->streak += 1;
                } elseif ($ultimaConexion && $ultimaConexion->diffInDays($hoy) > 1) {
                    // Pasó más de un día: perdió la racha
                    $user->streak = 1; 
                } else {
                    // Primera vez
                    $user->streak = 1;
                }
                
                $user->last_activity_date = $hoy;
                $user->save(); // <-- Ahora VS Code entenderá que este método existe
            }
        }
        return $next($request);
    }
}
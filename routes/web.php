<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Topic;
use App\Models\TopicProgress;
use App\Models\Attempt;
use App\Models\Reward;
use App\Models\School; 
use Carbon\Carbon; 

// 1. Ruta principal (redirige al login)
Route::get('/', function () {
    return redirect('/login');
});

// 2. Rutas del Login
Route::get('/login', function () {
    if (Auth::check() && Auth::user()->hasVerifiedEmail()) {
        return Auth::user()->role === 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/alumno/inicio');
    }
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        }
        return redirect()->intended('/alumno/inicio');
    }

    return back()->withErrors([
        'email' => 'El correo o la contraseña son incorrectos.',
    ])->onlyInput('email');
});

// 3. Rutas del Registro
Route::get('/register', function () {
    if (Auth::check() && Auth::user()->hasVerifiedEmail()) {
        return redirect('/alumno/inicio');
    }
    $schools = School::all();
    return view('register', compact('schools'));
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:5', 'confirmed'],
        'school_id' => ['required', 'exists:schools,id'], 
        'semester' => ['required', 'integer', 'min:1', 'max:12'], 
    ]);

    $semestersPassed = $request->semester - 1;
    $monthsToSubtract = $semestersPassed * 6; 
    $enrollmentDate = Carbon::now()->subMonths($monthsToSubtract);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'student', 
        'school_id' => $request->school_id,
        'semester' => $request->semester, 
        'enrollment_date' => $enrollmentDate, 
        'points' => 100,
        'hearts' => 5,
        'streak' => 1
    ]);

    Auth::login($user);
    event(new Registered($user));

    return redirect('/alumno/inicio')->with('success', '¡Bienvenido a DOMI! Revisa tu correo para verificar tu cuenta.');
});

// 4. Rutas de Verificación de Correo
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/alumno/inicio')->with('success', '¡Correo verificado exitosamente!');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', '¡Enlace de verificación enviado de nuevo!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// 5. Ruta para Cerrar Sesión
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


// 6. Rutas Protegidas (Alumnos con correo verificado)
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/alumno/inicio', function () {
        return view('inicio_Alu');
    });

    Route::get('/alumno/perfil', function () {
        return view('perfil_Alu');
    });

    Route::get('/alumno/materias', function () {
        $user = Auth::user();
        $materias = Subject::where('school_id', $user->school_id)
            ->where('semester', '<=', $user->semester) 
            ->orderBy('semester', 'desc')
            ->get();

        return view('materias_Alu', compact('materias'));
    });

    Route::get('/alumno/materia/detalle/{id}', function ($id) {
        $materia = Subject::where('school_id', Auth::user()->school_id)
            ->with('units.topics.questions')
            ->findOrFail($id);

        $progreso = TopicProgress::where('user_id', Auth::id())
            ->whereHas('topic.unit', function ($query) use ($id) {
                $query->where('subject_id', $id);
            })->get();
            
        return view('materia_detalle_Alu', compact('materia', 'progreso'));
    });

    Route::get('/alumno/progreso', function () {
        $intentos = Attempt::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();
        $fechas = $intentos->map(fn($i) => $i->created_at->format('d M'));
        $puntajes = $intentos->map(fn($i) => $i->score);

        return view('progreso_Alu', compact('fechas', 'puntajes'));
    });

    Route::get('/alumno/recompensas', function () {
        $recompensas = Reward::where('stock', '>', 0)->get();
        return view('recompensas_Alu', compact('recompensas'));
    });

    Route::post('/alumno/recompensas/canjear/{id}', function ($id) {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $recompensa = Reward::findOrFail($id);

        if ($user->points < $recompensa->cost_points) {
            return back()->with('error', 'No tienes suficientes puntos.');
        }
        if ($recompensa->stock <= 0) {
            return back()->with('error', 'Recompensa agotada.');
        }

        $user->points -= $recompensa->cost_points;
        $user->save();
        $recompensa->decrement('stock', 1);
        $user->rewards()->attach($recompensa->id);

        return back()->with('success', '¡Has canjeado ' . $recompensa->name . ' exitosamente!');
    });

    Route::get('/alumno/examen/{topic_id}', function ($topic_id) {
        $tema = \App\Models\Topic::with('questions.options')->findOrFail($topic_id);
        return view('examen_Alu', compact('tema'));
    });

    Route::post('/alumno/examen/{topic_id}', function (Illuminate\Http\Request $request, $topic_id) {
        $tema = \App\Models\Topic::with('questions.options')->findOrFail($topic_id);
        /** @var \App\Models\User $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->hearts <= 0) {
            return redirect('/alumno/materia/detalle/' . $tema->unit->subject_id)
                ->with('mensaje', 'No tienes corazones suficientes. Compra una recarga en la tienda.');
        }

        $correctas = 0;
        $totalPreguntas = $tema->questions->count();
        $corazonesPerdidos = 0;

        foreach ($tema->questions as $pregunta) {
            $respuestaUsuario = $request->input('pregunta_' . $pregunta->id);
            $esCorrecta = false;

            if ($respuestaUsuario) {
                $opcion = $pregunta->options->find($respuestaUsuario);
                if ($opcion && $opcion->is_correct) {
                    $correctas++;
                    $esCorrecta = true;
                }
            }
            
            if (!$esCorrecta) {
                $corazonesPerdidos++;
            }
        }

        $porcentaje = ($totalPreguntas > 0) ? ($correctas / $totalPreguntas) * 100 : 0;
        $aprobado = $porcentaje >= 60;
        $puntosGanados = $aprobado ? $tema->points_reward : 0;

        $user->hearts = max(0, $user->hearts - $corazonesPerdidos);
        $user->save();

        \App\Models\Attempt::create([
            'user_id' => $user->id,
            'topic_id' => $tema->id,
            'score' => $porcentaje,
            'points_earned' => $puntosGanados,
            'passed' => $aprobado,
        ]);

        if ($aprobado) {
            $user->points += $puntosGanados;
            $user->save();
            $progreso = \App\Models\TopicProgress::where('user_id', $user->id)->where('topic_id', $tema->id)->first();
            if ($progreso) {
                $progreso->update(['status' => 'completed', 'stars' => 3, 'best_score' => $porcentaje]);
            }
            $siguienteTema = \App\Models\Topic::where('unit_id', $tema->unit_id)->where('order', '>', $tema->order)->orderBy('order')->first();
            if ($siguienteTema) {
                \App\Models\TopicProgress::where('user_id', $user->id)->where('topic_id', $siguienteTema->id)->update(['status' => 'unlocked']);
            }
        }

        return redirect('/alumno/materia/detalle/' . $tema->unit->subject_id)
            ->with('mensaje', $aprobado ? "¡Felicidades! Has aprobado con $porcentaje% y ganado $puntosGanados puntos." : "Obtuviste $porcentaje%. Necesitas al menos 60% para aprobar.");
    });

    // --- RUTA DEL CHAT DE IA (Agregada para el siguiente paso) ---
    Route::post('/alumno/chat', function (Request $request) {
        return response()->json([
            'respuesta' => '¡Hola! Aún estoy aprendiendo a responder. Pronto podré ayudarte con tus dudas de ' . $request->mensaje
        ]);
    });
});

// 7. Rutas Protegidas para el Administrador
Route::middleware('auth')->prefix('admin')->group(function () {
    
    Route::get('/dashboard', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/alumno/inicio');
        }
        
        $miEscuela = Auth::user()->school_id;
        $totalMaterias = \App\Models\Subject::where('school_id', $miEscuela)->count();
        $totalAlumnos = \App\Models\User::where('role', 'student')->where('school_id', $miEscuela)->count();

        return view('admin.dashboard', compact('totalMaterias', 'totalAlumnos'));
    })->name('admin.dashboard');

    // --- CRUD DE MATERIAS ---
    Route::get('/materias', [\App\Http\Controllers\Admin\SubjectController::class, 'index'])->name('admin.materias.index');
    Route::get('/materias/crear', [\App\Http\Controllers\Admin\SubjectController::class, 'create'])->name('admin.materias.create');
    Route::post('/materias', [\App\Http\Controllers\Admin\SubjectController::class, 'store'])->name('admin.materias.store');
    Route::delete('/materias/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'destroy'])->name('admin.materias.destroy');

    // --- CRUD DE UNIDADES ---
    Route::get('/materia/{subject_id}', [\App\Http\Controllers\Admin\UnitController::class, 'index'])->name('admin.units.index');
    Route::post('/materia/{subject_id}/unidad', [\App\Http\Controllers\Admin\UnitController::class, 'store'])->name('admin.units.store');
    Route::delete('/unidades/{id}', [\App\Http\Controllers\Admin\UnitController::class, 'destroy'])->name('admin.units.destroy');

    // --- CRUD DE TEMAS ---
    Route::post('/unidad/{unit_id}/tema', [\App\Http\Controllers\Admin\TopicController::class, 'store'])->name('admin.topics.store');
    Route::delete('/temas/{id}', [\App\Http\Controllers\Admin\TopicController::class, 'destroy'])->name('admin.topics.destroy');

    // --- CRUD DE PREGUNTAS ---
    Route::get('/tema/{topic_id}/preguntas', [\App\Http\Controllers\Admin\QuestionController::class, 'index'])->name('admin.questions.index');
    Route::post('/tema/{topic_id}/pregunta', [\App\Http\Controllers\Admin\QuestionController::class, 'store'])->name('admin.questions.store');
    // Ruta para eliminar preguntas (la que faltaba)
    Route::delete('/preguntas/{id}', function ($id) {
        $pregunta = \App\Models\Question::findOrFail($id);
        $pregunta->delete();
        return back()->with('success', 'Pregunta eliminada correctamente.');
    })->name('admin.questions.destroy');

    // --- GESTIÓN DE ALUMNOS ---
    Route::get('/alumnos', function () {
        $alumnos = \App\Models\User::where('role', 'student')
            ->where('school_id', Auth::user()->school_id)
            ->orderBy('name')
            ->get();
        return view('admin.usuarios.index', compact('alumnos'));
    })->name('admin.usuarios.index');

    Route::put('/alumnos/{id}/semestre', function (Request $request, $id) {
        $request->validate(['semester' => 'required|integer|min:1|max:12']);
        
        $alumno = \App\Models\User::where('school_id', Auth::user()->school_id)->findOrFail($id);
        
        $semestersPassed = $request->semester - 1;
        $enrollmentDate = \Carbon\Carbon::now()->subMonths($semestersPassed * 6);

        $alumno->update([
            'semester' => $request->semester,
            'enrollment_date' => $enrollmentDate
        ]);

        return back()->with('success', 'Semestre del alumno actualizado.');
    })->name('admin.usuarios.update-semester');

    // Ruta para eliminar alumnos (la que faltaba)
    Route::delete('/alumnos/{id}', function ($id) {
        $alumno = \App\Models\User::where('school_id', Auth::user()->school_id)->findOrFail($id);
        $alumno->delete();
        return back()->with('success', 'Alumno eliminado correctamente.');
    })->name('admin.usuarios.destroy');
});
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Option;

class QuestionController extends Controller
{
    public function index($topic_id)
    {
        $tema = Topic::with('questions.options')->findOrFail($topic_id);
        return view('admin.questions.index', compact('tema'));
    }

    public function store(Request $request, $topic_id)
    {
        $request->validate([
            'question_text' => 'required|string',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
            'correct_option' => 'required|integer'
        ]);

        // 1. Crear la pregunta
        $pregunta = Question::create([
            'topic_id' => $topic_id,
            'question_text' => $request->question_text
        ]);

        // 2. Crear las opciones
        foreach ($request->options as $index => $option_text) {
            Option::create([
                'question_id' => $pregunta->id,
                'option_text' => $option_text,
                'is_correct' => ($index == $request->correct_option)
            ]);
        }

        return back()->with('success', 'Pregunta agregada correctamente.');
    }
}
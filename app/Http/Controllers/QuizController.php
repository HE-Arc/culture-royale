<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        // Fetch a random question
        $question = Question::inRandomOrder()->first();

        return view('quiz.index', compact('question'));
    }

    public function submitAnswer(Request $request)
    {
        $request->validate(['answer' => 'required', 'question_id' => 'required']);

        $question = Question::findOrFail($request->question_id);
        $isCorrect = strtolower(trim($request->answer)) === strtolower(trim($question->answer));

        // Fetch a new random question
        $nextQuestion = Question::where('id', '!=', $question->id)
                                ->inRandomOrder()
                                ->first();

        return response()->json([
            'correct' => $isCorrect,
            'nextQuestion' => $nextQuestion
        ]);
    }
}

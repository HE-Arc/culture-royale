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

        // Conversion en lowercase et split des mots
        $submittedWords = explode(' ', strtolower(trim($request->answer)));
        $correctWords = explode(' ', strtolower(trim($question->answer)));

        // On verifie que les mots soumis sont tous dans la reponse, validation plus relaxe
        $isCorrect = count(array_intersect($submittedWords, $correctWords)) == count($submittedWords);

        $nextQuestion = Question::where('id', '!=', $question->id)
                                ->inRandomOrder()
                                ->first();

        return response()->json([
            'correct' => $isCorrect,
            'nextQuestion' => $nextQuestion
        ]);
    }

}

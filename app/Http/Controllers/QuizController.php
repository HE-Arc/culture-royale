<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index()
    {

        session(['score' => 0]);

        // recherche d'une question aleatoire
        // ceci peut-etre ameliorer en utilisant un systeme de question deja repondu
        // afin de ne pas avoir 2 fois la meme question
        $question = Question::inRandomOrder()->first();

        return view('quiz.index', compact('question'));
    }

    public function start()
    {
        return view('quiz.start'); //on retourne la vue start avec le bouton
    }

    public function end(Request $request)
    {
        $score = $request->session()->get('score', 0); //on recupere le score de la session
        return view('quiz.end', compact('score'));
    }


    public function submitAnswer(Request $request)
    {
        $request->validate(['answer' => 'required', 'question_id' => 'required']);

        $currentQuestionId = $request->input('question_id');
        $lastQuestionId = $request->session()->get('last_question_id');

        $question = Question::findOrFail($currentQuestionId);
        // Conversion en lowercase et split des mots
        // Cette validation permet d'accepter une réponse comme "Inde", pour une réponse "En Inde, Inde du sud"
        // Il arrive que la validation n'as pas le comportement souhaité
        $submittedWords = explode(' ', strtolower(trim($request->answer)));
        $correctWords = explode(' ', strtolower(trim($question->answer)));

        $isCorrect = count(array_intersect($submittedWords, $correctWords)) == count($submittedWords);

        if ($isCorrect) {
            $score = $request->session()->get('score', 0);
            $request->session()->put('score', $score + 1);
        }

        do {
            $nextQuestion = Question::where('id', '!=', $currentQuestionId)
                                    ->inRandomOrder()
                                    ->first();
        } while ($nextQuestion && $nextQuestion->id == $lastQuestionId);

        // le systeme last_question_id permet de ne pas avoir 2 fois la meme question d'affilé
        // cela n'empeche pas d'avoir 2 fois la meme question dans le quiz
        $request->session()->put('last_question_id', $currentQuestionId);

        return response()->json([
            'correct' => $isCorrect,
            'nextQuestion' => $nextQuestion
        ]);
    }

}

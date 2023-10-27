<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', ['questions' => $questions]);
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1|max:30',
            'statement' => 'required|min:1|max:50',
            'difficulty' => 'required|integer|gte:1|lte:5',
            'answer' => 'required|min:1|max:50'
        ]);

        Question::create($request->all());

        return redirect()->route('questions.index')
            ->with('success','Question created successfully.');
    }

    public function show()
    {
        return redirect()->route('questions.index')
            ->with('success','Redirected from "show" route.');
        //TODO Implémenter
    }

    public function destroy($id)
    {
        Question::destroy($id);
        //TODO Implémenter
    }
}

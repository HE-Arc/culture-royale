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
            ->with('success', 'Question created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $question = Question::findOrFail($id);
        return view('questions.show', ['question' => $question]);
    }

    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully');
    }
}

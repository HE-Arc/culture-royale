<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class ModifQController extends Controller
{
    public function edit($id)
    {
        $question = Question::find($id);
        if (is_null($question)) {
            return redirect()->route('questions.index')->with('error', 'Question not found.');
        }
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'statement' => 'required',
            'difficulty' => 'required|integer|min:1|max:10',
            'answer' => 'required',
        ]);

        $question = Question::find($id);
        if (is_null($question)) {
            return redirect()->route('questions.index')->with('error', 'Question not found.');
        }

        $question->update($request->all());
        return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
    }
}

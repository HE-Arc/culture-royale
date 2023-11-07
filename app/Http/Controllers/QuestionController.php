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
            'answer' => 'required|min:1|max:50',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension(); //afin de determiner la question uploader le plus recemment
            $request->image->move(public_path('images'), $imageName);
            $input['image'] = $imageName;
        }

        Question::create($input);

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

    public function edit($id)
    {
        $question = Question::findOrFail($id);

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

        $question = Question::findOrFail($id);

        $question->update($request->all());
        return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
    }
}

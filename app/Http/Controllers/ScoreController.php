<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        $scoreboard = Score::orderBy('score', 'DESC')->limit(100)->get();
        return view('scores.index', ['scores' => $scoreboard]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'playername' => 'required|min:1|max:30',
            'score' => 'required|integer|gte:0|lte:2000000',
        ]);

        Score::create($request->all());

        return redirect()->route('scores.index');
    }
}

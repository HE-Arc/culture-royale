<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lobby;

class HomeController extends Controller
{
    public function index()
    {
        $lobbies = Lobby::all();
        return view('home', compact('lobbies'));
    }

}

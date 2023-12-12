<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lobby;

class PlayerController extends Controller
{
    public function create(int $id)
    {
        $lobby = Lobby::findOrFail($id);
        return view('players.create',  ['lobby' => $lobby]);
    }
}

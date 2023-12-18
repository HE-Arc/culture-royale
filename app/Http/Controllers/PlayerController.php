<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lobby;

class PlayerController extends Controller
{
    //fonction qui permet de creer un joueur
    public function create(int $id)
    {
        $lobby = Lobby::findOrFail($id);
        return view('players.create',  ['lobby' => $lobby]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Lobby;
use App\Models\Player;
use Illuminate\Http\Request;

class LobbyController extends Controller
{
    public function store()
    {
        $lobby = Lobby::create();

        return redirect()->route('players.create', ['id' => $lobby->id,])
            ->with('success', 'Lobby created successfully.');
    }

    public function join(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:24',
            'lobby_id' => 'required',
        ]);

        $player = Player::create($request->all());
        session(['currentPlayer' => $player]);

        return redirect()->route('lobbies.waiting', ['id' => $request['lobby_id'],])
            ->with('success', 'Lobby joined successfully.');
    }

    public function waiting(int $id)
    {
        $lobby = Lobby::findOrFail($id);
        $players = Player::where('lobby_id', $id)->get();
        $currentPlayer = session('currentPlayer');

        return view('lobbies.waiting', ['lobby' => $lobby, 'players' => $players, 'currentPlayer' => $currentPlayer]);
    }
}

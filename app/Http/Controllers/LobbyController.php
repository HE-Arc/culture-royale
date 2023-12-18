<?php

namespace App\Http\Controllers;

use App\Models\Lobby;
use App\Models\Player;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\ScoreController;

class LobbyController extends Controller
{
    //fonction qui permet de creer un lobby ou de rejoindre un lobby existant
    public function store(Request $request)
    {

        $lobbyId = $request->input('lobby_id');
        $playerName = $request->input('playername');

        if ($lobbyId) {
            $lobby = Lobby::find($lobbyId);
            if (!$lobby) {
                $lobby = Lobby::create();
                session(['currentLobby' => $lobby]);
            }
        } else {
            $lobby = Lobby::create();
            session(['currentLobby' => $lobby]);
        }

        $player = Player::where('lobby_id', $lobby->id)
            ->where('name', $playerName)
            ->first();
        // permet d'eviter de creer un joueur avec le meme nom dans le meme lobby
        if ($player) {

            session(['currentPlayer' => $player]);


            return redirect()->route('lobbies.waiting', ['id' => $lobby->id]);
        } else {

            return redirect()->route('players.create', ['id' => $lobby->id]);
        }
    }

    //fonction qui permet de rejoindre un lobby existant  
    //cette fonction peut-être remplacé par la fonction store qui a été modifié en cours de route
    //On a choisi de la guarder car elle est appellé à d'autres endroits, par souci de temps
    public function join(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:24',
            'lobby_id' => 'required',
        ]);

        $playerName = $request->input('name');
        $lobbyId = $request->input('lobby_id');

        // créer un joueur avec le nom et l'id du lobby
        $player = Player::firstOrCreate(
            ['name' => $playerName, 'lobby_id' => $lobbyId],
            ['name' => $playerName, 'lobby_id' => $lobbyId]
        );

        $lobby = Lobby::find($lobbyId);

        session(['currentPlayer' => $player]);
        session(['currentLobby' => $lobby]);

        return redirect()->route('lobbies.waiting', ['id' => $lobbyId]);
    }

    //fonction qui permet d'afficher la page d'attente
    //le culture king est le joueur qui a le plus de points, determiné par highestScorePlayerId
    public function waiting(int $id)
    {
        $lobby = Lobby::findOrFail($id);
        $players = Player::where('lobby_id', $id)->get();
        $currentPlayer = session('currentPlayer');

        // recupere les scores des joueurs
        $playerScores = [];
        foreach ($players as $player) {
            $score = Score::where('playername', $player->name)->first();
            // si le joueur n'a pas de score, on lui attribue null
            $playerScores[$player->id] = $score ? $score->score : null;
        }

        session(['currentPlayers' => $players]);

        $highestScorePlayerId = array_search(max($playerScores), $playerScores);


        return view('lobbies.waiting', [
            'lobby' => $lobby,
            'players' => $players,
            'currentPlayer' => $currentPlayer,
            'playerScores' => $playerScores,
            'highestScorePlayerId' => $highestScorePlayerId
        ]);
    }
}

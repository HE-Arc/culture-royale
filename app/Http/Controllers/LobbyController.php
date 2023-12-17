<?php

namespace App\Http\Controllers;

use App\Models\Lobby;
use App\Models\Player;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\ScoreController;

class LobbyController extends Controller
{
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
        
        if ($player) {
                        
            session(['currentPlayer' => $player]);
                
            
            return redirect()->route('lobbies.waiting', ['id' => $lobby->id])
                                 ->with('success', 'Welcome back to the lobby!');
                                 
        } else {
                       
            return redirect()->route('players.create', ['id' => $lobby->id])
                                         ->with('success', 'Lobby joined successfully.');
        }
    }


    public function join(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:24',
            'lobby_id' => 'required',
        ]);
    
        $playerName = $request->input('name');
        $lobbyId = $request->input('lobby_id');
    
        // Find or create the player
        $player = Player::firstOrCreate(
            ['name' => $playerName, 'lobby_id' => $lobbyId],
            ['name' => $playerName, 'lobby_id' => $lobbyId]
        );
    
        $lobby = Lobby::find($lobbyId);
    
        // Set currentPlayer and currentLobby in session
        session(['currentPlayer' => $player]);
        session(['currentLobby' => $lobby]);
    
        return redirect()->route('lobbies.waiting', ['id' => $lobbyId])
                         ->with('success', 'Lobby joined successfully.');
    }
    

    public function waiting(int $id)
    {
        $lobby = Lobby::findOrFail($id);
        $players = Player::where('lobby_id', $id)->get();
        $currentPlayer = session('currentPlayer');
    
        // Fetch scores for each player
        $playerScores = [];
        foreach ($players as $player) {
            $score = Score::where('playername', $player->name)->first();
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

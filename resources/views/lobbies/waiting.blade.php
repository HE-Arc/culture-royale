@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/layout/game.css') }}">
<link rel="stylesheet" href="{{ asset('css/lobbies/waiting.css') }}">
<script src="{{ asset('js/copyLinkToClipboard.js') }}"></script>
@section('content')
    <h1>Salon</h1>
    <h2>Joueurs</h2>
    <!-- liste de joueurs du lobby -->
    <div>
        <ul>
            @foreach ($players as $player)
                <li>
                    @if ($player->id == $currentPlayer->id)
                        <b>{{ $player->name }}</b>
                    @else
                        {{ $player->name }}
                    @endif
                    - Score: {{ $playerScores[$player->id] ?? 'N/A' }}
                    @if ($player->id == $highestScorePlayerId)
                        <!-- affichage de la couronne pour le joueur avec le plus haut score -->
                        <img id="crown" src="{{asset('images/crown.png')}}">
                    @endif
                </li>
            @endforeach
        </ul>
        <!-- l'ujtilisateur peut copier le lien d'invitation et lancer la partie -->
        <button class="btn btn-primary"
            onclick="copyLinkToClipboard('{{ route('players.create', ['id' => $lobby->id]) }}', this)">Copier le lien
            d'invitation</button>
        <button class="btn btn-success" onclick="window.location.href='{{ route('quiz.index') }}'">Lancer la
            partie</button>
    </div>
@endsection

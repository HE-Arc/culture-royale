@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/layout/game.css') }}">
<script src="{{ asset('js/copyLinkToClipboard.js') }}"></script>
@section('content')
    <h1>Salon</h1>
    <h2>Joueurs</h2>
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
                     <!-- Icone de couronne pour le king -->
                        (Culture King)
                    @endif
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary" onclick="copyLinkToClipboard('{{route('players.create', ['id' => $lobby->id])}}', this)">Copier le lien d'invitation</button>
    </div>
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <button class="btn btn-success" onclick="window.location.href='{{ route('quiz.index') }}'">Start Quiz</button>
        </div>
        </div>
    </div>
@endsection

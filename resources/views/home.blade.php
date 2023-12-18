@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/layout/game.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@section('content')
    <h1>Culture Royale</h1>
    <p class="lead">Bienvenue</p>
    <h3>Salons disponibles</h3>
    <!-- affichage des salons -->
    <div class="container mt-3">
        <form action="{{ route('lobbies.store') }}" method="post">
            @csrf
            <input type="submit" class="btn btn-primary btn-sm" value="Créer un salon" />
        </form>
        <div class="list-group">
            @foreach ($lobbies as $lobby)
                <div class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        Salon #{{ $lobby->id }}
                        <!-- permet de rejoindre un salon si on est connecté, sinon on est redirigé vers la page de connexion -->
                        @if (session('currentPlayer'))
                            <form action="{{ route('lobbies.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="lobby_id" value="{{ $lobby->id }}" />
                                <input type="hidden" name="playername" value="{{ session('currentPlayer')->name }}" />
                                <input type="submit" class="btn btn-primary btn-sm" value="Rejoindre" />
                            </form>
                        @else
                            <form action="{{ route('players.create', ['id' => $lobby->id]) }}" method="get">
                                @csrf
                                <input type="submit" class="btn btn-primary btn-sm" value="Rejoindre" />
                            </form>
                        @endif
                    </div>
                    @if ($lobby->players->isNotEmpty())
                        <div>
                            <strong>Joueurs:</strong>
                            <ul>
                                @foreach ($lobby->players as $player)
                                    <li>{{ $player->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p>Aucun joueur dans ce salon.</p> <!-- devrait etre impossible mais on sait jamais -->
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/layout/game.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@section('content')
    <h1>Culture Royale</h1>
    <p class="lead">Bienvenue</p>
    <h3>Available Lobbies</h3>
    <div class="container mt-3">
    <form action="{{ route('lobbies.store') }}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary btn-sm" value="Create Lobby" />
    </form>
    <div class="list-group">
        @foreach ($lobbies as $lobby)
            <div class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    Lobby #{{ $lobby->id }}
                    <!-- Join Lobby Form - POST-->
                    <form action="{{ route('lobbies.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="lobby_id" value="{{ $lobby->id }}" />
                        <input type="hidden" name="playername" value="{{ session('currentPlayer')->name }}" />
                        <input type="submit" class="btn btn-primary btn-sm" value="Join" />
                    </form>
                </div>
                @if ($lobby->players->isNotEmpty())
                    <div>
                        <strong>Players:</strong>
                        <ul>
                            @foreach ($lobby->players as $player)
                                <li>{{ $player->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
                <p>Aucun joueur dans ce lobby.</p> <!-- devrait etre impossible mais on sait jamais -->
                @endif
            </div>
        @endforeach
    </div>
</div>

@endsection


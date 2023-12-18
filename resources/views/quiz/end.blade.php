@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/layout/game.css') }}">
@section('content')
    <div class="container mt-5">
        <!-- affichage du score final -->
        <!-- permet de naviguer vers la page d'accueil ou vers le salon -->
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h1>Quiz terminé!</h1>
                <p>Votre score final: {{ $score }}</p>
                <a href="{{ route('quiz.index') }}" class="btn btn-success">Relancer la partie</a>
                <a href="{{ route('lobbies.waiting', ['id' => session('currentLobby')->id]) }}"
                    class="btn btn-danger">Retourner au salon</a>
                <form action="{{ route('scores.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="playername" value="{{ session('currentPlayer')->name }}" />
                    <input type="hidden" name="score" value="{{ $score }}" />
                    <input type="submit" class="btn btn-light mt-3" value="Sauvegarder mon score" />
                </form>
            </div>
        </div>
    </div>
@endsection

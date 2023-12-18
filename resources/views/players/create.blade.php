@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/layout/game.css') }}">
@section('content')
    <h1>Rejoindre une partie</h1>
    <!-- formulaire pour rejoindre une partie et créer un joueur-->
    <form action="{{ route('lobbies.join') }}" method="POST">
        @csrf
        <input type="hidden" id="lobby_id" name="lobby_id" value="{{ $lobby->id }}">
        <input type="text" id="name" name="name" placeholder="Mon pseudo" class="form-control mt-3">
        <input type="submit" value="Rejoindre" class="btn btn-primary mt-3">
    </form>
@endsection

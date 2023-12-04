@extends('layout.app')
@section('content')
    <h1>Rejoindre une partie</h1>

    <table class="table">
        <form action="{{ route('lobbies.join') }}" method="POST">
            @csrf
            <input type="hidden" id="lobby_id" name="lobby_id" value="{{$lobby->id}}">
            <label for="name">Pseudo</label>
            :
            <input type="text" id="name" name="name" placeholder="Mon pseudo">
            <input type="submit" value="Rejoindre">
        </form>
    </table>
@endsection

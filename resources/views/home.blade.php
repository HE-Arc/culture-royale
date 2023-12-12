@extends('layout.app')
@section('content')
    <h1>Culture Royale</h1>
    <p class="lead">Bienvenue</p>
    <form action="{{ route('lobbies.store') }}" method="post">
        @csrf
        <input type="submit" name="play" value="Play" />
    </form>

@endsection

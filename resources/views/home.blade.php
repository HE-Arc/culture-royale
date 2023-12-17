@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/layout/game.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@section('content')
    <div class="d-flex flex-column align-items-center">
        <h1>Culture Royale</h1>
        <p>
            Relevez le défi de Culture Royale !
            Affrontez vos amis, créez des salons exclusifs,
            et montrez qui domine le royaume de la culture générale.
            Qui sera couronné champion ? Rejoignez-nous et réclamez le trône intellectuel !
        </p>
        <form action="{{ route('lobbies.store') }}" method="post">
            @csrf
            <input type="submit" name="create-lobby" value="Créer un salon" class="btn btn-primary" />
        </form>
    </div>
@endsection

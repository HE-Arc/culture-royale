@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/layout/game.css') }}">
@section('content')
    <h1>Culture Royale</h1>
    <p class="lead">Top mondial</p>
    <!-- affichage des scores du top mondial -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Place</th>
                <th scope="col">Joueur</th>
                <th scope="col">Score</th>
            </tr>
        </thead>
        <tbody>
            @php
                $counter = 1;
            @endphp
            @foreach ($scores as $score)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $score->playername }}</td>
                    <td>{{ $score->score }}</td>
                </tr>
                @php
                    $counter++;
                @endphp
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}"
                    class="btn btn-light mt-3">Retourner</a>
@endsection

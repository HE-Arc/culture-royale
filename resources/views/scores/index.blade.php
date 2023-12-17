@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/layout/game.css') }}">
@section('content')
    <h1>Culture Royale</h1>
    <p class="lead">Top mondial</p>

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
@endsection

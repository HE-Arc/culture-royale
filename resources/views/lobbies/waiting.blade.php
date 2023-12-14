@extends('layout.app')
@section('content')
    <h1>Waiting to start game...</h1>
    <div>
        <ul>
            @foreach ($players as $player)
                <li>
                    @if ($player->id == $currentPlayer->id)
                        <b>{{ $player->name }}</b>
                    @else
                        {{ $player->name }}
                    @endif

                </li>
            @endforeach
        </ul>
    </div>
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <button class="btn btn-success" onclick="window.location.href='{{ route('quiz.index') }}'">Start Quiz</button>
        </div>
        </div>
    </div>
@endsection

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
@endsection

@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <h1>Quiz terminé!</h1>
            <p>Votre score final: {{ $score }}</p>
            <a href="{{ route('quiz.index') }}" class="btn btn-primary">Restart Quiz</a>
        </div>
    </div>
</div>
@endsection

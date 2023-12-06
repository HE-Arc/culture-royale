@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <button class="btn btn-success" onclick="window.location.href='{{ route('quiz.index') }}'">Start Quiz</button>
        </div>
    </div>
</div>
@endsection

@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Question</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('questions.update', $question->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $question->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="statement">Statement</label>
                            <textarea class="form-control" id="statement" name="statement" required>{{ $question->statement }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="difficulty">Difficulty</label>
                            <input type="number" class="form-control" id="difficulty" name="difficulty" value="{{ $question->difficulty }}" required>
                        </div>

                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <input type="text" class="form-control" id="answer" name="answer" value="{{ $question->answer }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

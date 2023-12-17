@extends('layout.app')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if (session('currentPlayer'))
                <div class="alert alert-info">
                    Playing as: {{ session('currentPlayer')->name }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <strong>Question:</strong>
                </div>
                <div class="card-body">
                    <p id="question">{{ $question->statement }}</p>
                    @if ($question->image)
                    <img id="question-image" src="{{ $question->image ? asset('images/' . $question->image) : '' }}" alt="Question Image" class="img-fluid mb-3" style="{{ $question->image ? '' : 'display: none;' }}">
                    @endif
                    <div id="timer" class="alert alert-warning text-center">
                        Temps: <strong>10 seconds</strong>
                    </div>

                    <!-- Answer Form -->
                    <form id="answer-form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="answer" placeholder="Enter your answer">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Answer</button>
                    </form>
                    <div id="score">Score: 0</div>
                    <div id="end-message"></div>

                    <div class="mt-4">
                        <h5>Membres du lobby:</h5>
                        <div class="d-flex flex-row">
                            @foreach (session('currentPlayers', []) as $player)
                                <div class="text-center mr-3">
                                    <div class="avatar" style="width: 50px; height: 50px; background-color: #ddd; border-radius: 50%;"></div>
                                    <small>{{ $player->name }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('storage/quiz.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() { //au cas ou le contenu charge avant le script
        initializeQuiz({
            submitUrl: '{{ route('quiz.submit') }}',
            questionId: '{{ $question->id }}',
            nextQuestionUrl: '{{ route('quiz.index') }}',
            image_url: '{{ $question->image }}',
        });
    });
</script>




@endsection


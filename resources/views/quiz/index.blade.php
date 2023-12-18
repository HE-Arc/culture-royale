@extends('layout.app')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/layout/game.css') }}">
<link rel="stylesheet" href="{{ asset('css/quiz/index.css') }}">
@section('content')
    <!-- Quiz Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div id="question-container">
                    <p class="lead" id="question" style="display: inline">{{ $question->statement }}</p>
                    @if ($question->image)
                        <img id="question-image" src="{{ $question->image ? asset('images/' . $question->image) : '' }}"
                            alt="Question Image" class="img-fluid mb-3"
                            style="{{ $question->image ? '' : 'display: none;' }}">
                    @endif
                </div>
                <div id="timer" class="alert alert-warning text-center">
                    Temps : <strong>10 secondes</strong>
                </div>

                <!-- champ de réponse -->
                <form id="answer-form">
                    <div class="form-group">
                        <input type="text" class="form-control" id="answer" placeholder="Ta réponse">
                    </div>
                    <button type="submit" class="btn btn-success">Répondre</button>
                </form>
                <div id="score">Score: 0</div>
                <div id="end-message"></div>
                <!-- affichage des joueurs du lobby-->
                <div class="mt-4">
                    <h5>Joueurs :</h5>
                    <div class="d-flex flex-row">
                        @foreach (session('currentPlayers', []) as $player)
                            <div class="text-center mr-3">
                                <div class="avatar"
                                    style="width: 50px; height: 50px; background-color: #ddd; border-radius: 50%;">
                                </div>
                                <small>{{ $player->name }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- script avec ajax pour le quiz, voir quiz.js -->
    <script src="{{ asset('js/quiz.js') }}"></script>
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

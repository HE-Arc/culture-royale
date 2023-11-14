@extends('layout.app')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-primary" href="{{ route('questions.index') }}"> Retour</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header" style="font-size: 1.2rem">
                    <strong>{{ $question->title }}</strong>
                </div>
                <div class="card-body">
                    @if ($question->image)
                    <div class="text-center">
                        <img src="{{ asset('images/' . $question->image) }}" alt="Question Image" class="img-fluid">
                    </div>
                    @endif
                    <div class="form-row">
                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <strong>Énoncé :</strong>
                                {{ $question->statement }}
                            </div>
                            <div class="form-group col-6">
                                <strong>Difficulté :</strong>
                                {{ $question->difficulty }}
                            </div>
                            <div class="form-group col-6">
                                <strong>Réponse :</strong>
                                {{ $question->answer }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

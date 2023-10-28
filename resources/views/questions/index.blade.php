@extends('layout.app')
@section('content')
    <h1>Questions</h1>

    <a href="{{ route('questions.create') }}" class="btn btn-primary float-right mb-2"><i class="bi bi-plus"></i>  Ajouter une question</a>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Énoncé</th>
                <th scope="col">Difficulté</th>
                <th scope="col">Réponse</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->title }}</td>
                    <td>{{ $question->statement }}</td>
                    <td>{{ $question->difficulty }}</td>
                    <td>{{ $question->answer }}</td>
                    <td style="display:flex;flex-direction:row;gap:5px;">
                        <a class="btn btn-info" href="{{ route('questions.show', $question->id) }}"><i
                                class="bi bi-eye"></i></a>
                        <a class="btn btn-primary" href="{{ route('questions.edit', $question->id) }}"><i
                                class="bi bi-pencil"></i></a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

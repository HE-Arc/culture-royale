@extends('layout.app')
@section('content')
    <h1>Créer une nouvelle question</h1>

    <table class="table">
        <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <tr>
                <td><label for="title">Titre de la question</label></td>
                <td> : </td>
                <td><input type="text" id="title" name="title" placeholder="Détrompez-vous"></td>
            </tr>
            <tr>
                <td><label for="statement">Question</label></td>
                <td> : </td>
                <td><input type="text" id="statement" name="statement"
                        placeholder="Quel est le poids d'un éléphant d'afrique"></td>
            </tr>
            <tr>
                <td><label for="difficulty">Difficulté</label></td>
                <td> : </td>
                <td><input type="number" id="difficulty" name="difficulty" placeholder="min. 1, max. 5"></td>
            </tr>
            <tr>
                <td><label for="answer">Réponse</label></td>
                <td> : </td>
                <td><input type="text" id="answer" name="answer" placeholder="4 à 6 tonnes"></td>
            </tr>
            <tr>
                <td><label for="image">Image</label></td>
                <td> : </td>
                <td><input type="file" class="form-control" id="image" name="image" placeholder="illustration de la question"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Créer une nouvelle question"></td>
            </tr>
        </form>
    </table>
@endsection

<h1>Livres</h1>

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
                <td><!--Boutons--></td>
            </tr>
        @endforeach
    </tbody>
</table>

@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Ajouter une question</h1>
                <!-- formulaire pour ajouter une question -->
                <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="statement">Énoncé</label>
                        <textarea class="form-control" id="statement" name="statement" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="difficulty">Difficulté</label>
                        <input type="number" class="form-control" id="difficulty" name="difficulty" required>
                    </div>

                    <div class="form-group">
                        <label for="answer">Réponse</label>
                        <input type="text" class="form-control" id="answer" name="answer" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Choisir une image</label>
                        <input type="file" id="image" name="image" class="form-control"
                            accept=".jpeg,.png,.jpg,.gif,.svg">
                            <!-- les tests ont été fait avec des images en .jpg, .png-->
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter la question</button>
                </form>
            </div>
        </div>
    </div>
@endsection

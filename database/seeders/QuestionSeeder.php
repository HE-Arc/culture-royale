<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = array();

        array_push(
            $questions,
            new Question([
                "title" => "Sous l'eau",
                "statement" => "Quel est le plus long fleuve du monde ?",
                "difficulty" => 2,
                "answer" => "Le Nil",
                "image" => "nil.jpg"
            ]),
            // 2
            new Question([
                "title" => "Artiste peintre",
                "statement" => "Qui a peint la Joconde ?",
                "difficulty" => 1,
                "answer" => "Léonard de Vinci",
                "image" => "joconde.jpg"
            ]),
            // 3
            new Question([
                "title" => "L'exploration spatiale",
                "statement" => "Quelle est la première personne à avoir marché sur la lune ?",
                "difficulty" => 2,
                "answer" => "Neil Armstrong",
                "image" => "lune.jpg"
            ]),
            // 4
            new Question([
                "title" => "Dans l'espace",
                "statement" => "Quelle planète est connue comme la 'Planète Rouge' ?",
                "difficulty" => 2,
                "answer" => "Mars",
                "image" => "mars.jpg"
            ]),
            // 5
            new Question([
                "title" => "Égypte antique",
                "statement" => "Qui était le dernier pharaon d'Égypte ?",
                "difficulty" => 3,
                "answer" => "Cléopâtre",
                "image" => "cleopatre.jpg"
            ]),
                    // 6
            new Question([
                "title" => "Ciel étoilé",
                "statement" => "Quelle est la plus grande constellation dans le ciel nocturne ?",
                "difficulty" => 2,
                "answer" => "La Vierge",
                "image" => "constellation_vierge.jpg"
            ]),
            // 7
            new Question([
                "title" => "Chef-d'œuvre de la littérature",
                "statement" => "Qui est l'auteur de 'L'Étranger' ?",
                "difficulty" => 3,
                "answer" => "Albert Camus",
                "image" => "camus.jpg"
            ]),
            // 8
            new Question([
                "title" => "Voyage dans le temps",
                "statement" => "En quelle année a commencé la Révolution française ?",
                "difficulty" => 3,
                "answer" => "1789",
                "image" => "revolution_francaise.jpg"
            ]),
            // 9
            new Question([
                "title" => "Innovations technologiques",
                "statement" => "Qui est connu pour avoir inventé l'ampoule électrique ?",
                "difficulty" => 1,
                "answer" => "Thomas Edison",
                "image" => "edison.jpg"
            ]),
            // 10
            new Question([
                "title" => "Sur la piste des dinosaures",
                "statement" => "Quel dinosaure est connu pour son grand cou ?",
                "difficulty" => 2,
                "answer" => "Le Brachiosaure",
                "image" => "brachiosaure.jpg"
            ]),
                    // 11
            new Question([
                "title" => "Exploration de l'espace",
                "statement" => "Quelle est la première femme à avoir voyagé dans l'espace ?",
                "difficulty" => 2,
                "answer" => "Valentina Terechkova",
                "image" => "terechkova.jpg"
            ]),
            // 12
            new Question([
                "title" => "Merveille architecturale",
                "statement" => "Où se trouve le Taj Mahal ?",
                "difficulty" => 1,
                "answer" => "En Inde",
                "image" => "taj_mahal.jpg"
            ]),
            // 13
            new Question([
                "title" => "Profondeurs marines",
                "statement" => "Quel est l'océan le plus profond sur Terre ?",
                "difficulty" => 2,
                "answer" => "L'océan Pacifique",
                "image" => "ocean_pacifique.jpg"
            ]),
            // 14
            new Question([
                "title" => "Les Grands Compositeurs",
                "statement" => "Qui a composé la 5ème Symphonie ?",
                "difficulty" => 3,
                "answer" => "Ludwig van Beethoven",
                "image" => "beethoven.jpg"
            ]),
            // 15
            new Question([
                "title" => "Capitales du monde",
                "statement" => "Quelle est la capitale de l'Espagne ?",
                "difficulty" => 1,
                "answer" => "Madrid",
                "image" => "madrid.jpg"
            ]),

        );

        foreach ($questions as $question) {
            $question->save();
        }
    }
}

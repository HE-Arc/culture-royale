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
                "title" => "Un peu de hauteur !",
                "statement" => "Quelle est la plus haute montagne du monde ?",
                "difficulty" => 1,
                "answer" => "L'Everest"
            ]),
            new Question([
                "title" => "Revoir ses bases",
                "statement" => "16 + 20 x 2 - 6 = ?",
                "difficulty" => 1,
                "answer" => "50"
            ]),
            new Question([
                "title" => "Raaaaaawr",
                "statement" => "Quelle période de la préhistoire a donné son nom a un film de Steven Spielberg",
                "difficulty" => 3,
                "answer" => "Le Jurassique"
            ]),
            new Question([
                "title" => "Complètement à l'Ouest",
                "statement" => "Quel pays est appelé le 'pays du soleil levant' ?",
                "difficulty" => 3,
                "answer" => "Le Japon"
            ]),
            new Question([
                "title" => "Bienvenue sur Arrakis",
                "statement" => "Quel réalisateur est connu pour avoir adapté la série 'Dune' de Frank Herbet en films ?",
                "difficulty" => 4,
                "answer" => "Denis Villeneuve"
            ]),

        );

        foreach ($questions as $question) {
            $question->save();
        }
    }
}

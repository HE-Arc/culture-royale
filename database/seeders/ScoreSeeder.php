<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scores = array();

        array_push(
            $scores,
            new Score([
                "playername" => "Player1",
                "score" => 125,
            ]),
            new Score([
                "playername" => "Player2",
                "score" => 53,
            ]),
            new Score([
                "playername" => "Player3",
                "score" => 1200,
            ]),
            new Score([
                "playername" => "Player4",
                "score" => 2,
            ]),
            new Score([
                "playername" => "Player5",
                "score" => 88,
            ]),
        );

        foreach ($scores as $score) {
            $score->save();
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("questions")->insert(
            [
                [
                    'id' => 1,
                    'question' => "Complete com a alternativa correta: She ____ very nice.",
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'question' => "Pergunta teste para o tema 2",
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}

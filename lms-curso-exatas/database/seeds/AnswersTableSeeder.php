<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("answers")->insert(
            [
                [
                    'id' => 1,
                    'question_id' => 1,
                    'answer' => 'is',
                    'is_correct' => true,
                ],
                [
                    'id' => 2,
                    'question_id' => 1,
                    'answer' => 'are',
                    'is_correct' => false,
                ],
                [
                    'id' => 3,
                    'question_id' => 1,
                    'answer' => 'am',
                    'is_correct' => false,
                ],
                [
                    'id' => 4,
                    'question_id' => 1,
                    'answer' => 'were',
                    'is_correct' => false,
                ],
                [
                    'id' => 5,
                    'question_id' => 1,
                    'answer' => 'certa',
                    'is_correct' => true,
                ],
                [
                    'id' => 6,
                    'question_id' => 1,
                    'answer' => 'errada',
                    'is_correct' => false,
                ],
                [
                    'id' => 7,
                    'question_id' => 1,
                    'answer' => 'errada',
                    'is_correct' => false,
                ],
                [
                    'id' => 8,
                    'question_id' => 1,
                    'answer' => 'errada',
                    'is_correct' => false,
                ],
            ]
        );
    }
}

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
                    'questionnaire_id' => 1,
                    'question_id' => 2,
                    'alternative_id' => 3,
                    'student_id' => 3,
                ],
                [
                    'id' => 2,
                    'questionnaire_id' => 1,
                    'question_id' => 1,
                    'alternative_id' => 1,
                    'student_id' => 3,
                ],
            ]
        );
    }
}

<?php

use Illuminate\Database\Seeder;

class QuestionnaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("questionnaires")->insert(
            [
                [
                    'name' => 'Questionario Seed Teste',
                    'professor_id' => 2,
                    'course_id' => 1,
                ],
                [
                    'name' => 'Questionario Seed Teste',
                    'professor_id' => 2,
                    'course_id' => 2,
                ],
            ]
        );
    }
}

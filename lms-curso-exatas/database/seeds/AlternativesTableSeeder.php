<?php

use Illuminate\Database\Seeder;

class AlternativesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("alternatives")->insert(
            [
                [
                    'id' => 1,
                    'question_id' => 1,
                    'alternative' => 'is',
                    'is_correct' => true,
                ],
                [
                    'id' => 2,
                    'question_id' => 1,
                    'alternative' => 'are',
                    'is_correct' => false,
                ],
                [
                    'id' => 3,
                    'question_id' => 1,
                    'alternative' => 'am',
                    'is_correct' => false,
                ],
                [
                    'id' => 4,
                    'question_id' => 1,
                    'alternative' => 'were',
                    'is_correct' => false,
                ],
                [
                    'id' => 5,
                    'question_id' => 2,
                    'alternative' => 'certa',
                    'is_correct' => true,
                ],
                [
                    'id' => 6,
                    'question_id' => 2,
                    'alternative' => 'errada',
                    'is_correct' => false,
                ],
                [
                    'id' => 7,
                    'question_id' => 2,
                    'alternative' => 'errada',
                    'is_correct' => false,
                ],
                [
                    'id' => 8,
                    'question_id' => 2,
                    'alternative' => 'errada',
                    'is_correct' => false,
                ],
            ]
        );
    }
}

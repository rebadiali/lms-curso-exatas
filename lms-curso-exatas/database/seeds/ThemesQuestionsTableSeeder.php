<?php

use Illuminate\Database\Seeder;

class ThemesQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table("question_theme")->insert(
            [
                [
                    'theme_id' => 1,
                    'question_id' => 1,
                ],
                [
                    'theme_id' => 2,
                    'question_id' => 1,
                ],
                [
                    'theme_id' => 2,
                    'question_id' => 2,
                ],
            ]
    );
    }
}

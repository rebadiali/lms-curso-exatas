<?php

use Illuminate\Database\Seeder;

class QuestionnairesThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("questionnaire_theme")->insert(
            [
                [
                    'theme_id' => 1,
                    'questionnaire_id' => 1,
                    'quantity' => 5,
                ],
                [
                    'theme_id' => 2,
                    'questionnaire_id' => 1,
                    'quantity' => 5,
                ],
                [
                    'theme_id' => 2,
                    'questionnaire_id' => 2,
                    'quantity' => 10,
                ],
            ]
        );
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(ThemesQuestionsTableSeeder::class);
        $this->call(AlternativesTableSeeder::class);
        $this->call(QuestionnaireTableSeeder::class);
        $this->call(QuestionnairesThemesTableSeeder::class);
        $this->call(\AnswersTableSeeder::class);
    }
}

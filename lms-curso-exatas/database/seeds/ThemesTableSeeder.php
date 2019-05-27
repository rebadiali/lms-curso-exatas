<?php

use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("themes")->insert(
            [
                [
                    'id' => 1,
                    'theme' => "Verbo to be",
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'theme' => "Tema 2",
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}

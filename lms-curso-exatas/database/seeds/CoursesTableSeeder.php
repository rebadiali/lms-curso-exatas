<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("courses")->insert(
            [
                [
                    'id' => 1,
                    'professor_id' => 2,
                    'name' => "Inglês Técnico",
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'professor_id' => 2,
                    'name' => "Segurança",
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}

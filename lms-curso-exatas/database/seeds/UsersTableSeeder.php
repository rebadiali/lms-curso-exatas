<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert(
            [
                [
                    'id' => 1,
                    'user_type' => User::ADMIN,
                    'name' => "Admin",
                    'email' => "admin@admin.com",
                    'password' => Hash::make(123456),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'user_type' => User::PROFESSOR,
                    'name' => "Professor",
                    'email' => "professor@professor.com",
                    'password' => Hash::make(123456),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 3,
                    'user_type' => User::ALUNO,
                    'name' => "Aluno",
                    'email' => "aluno@aluno.com",
                    'password' => Hash::make(123456),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}

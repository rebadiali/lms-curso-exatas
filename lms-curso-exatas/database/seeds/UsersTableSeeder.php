<?php

use Illuminate\Database\Seeder;

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
            array(
                'id' => 1,
                'user_type' => 'admin',
                'name' => "Renata",
                'email' => "rb@gmail.com",
                'password' => Hash::make(123456),
                'created_at' => now(),
                'updated_at' => now(),
            )
        );
    }
}

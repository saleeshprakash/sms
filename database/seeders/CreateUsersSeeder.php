<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                [
                    'name' => "Katie",
                    'email' => "katie@gmail.com",
                    'password' => bcrypt('password'),
                    'role' => "teacher",
                    'created_at'=> now()
                ],
                [
                    'name' => "Max",
                    'email' => "max@gmail.com",
                    'password' => bcrypt('password'),
                    'role' => "teacher",
                    'created_at'=> now()
                ]
            ],
        );
    }
}

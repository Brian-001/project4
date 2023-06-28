<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        $users = [
            [
                'id' => 2,
                'name' => 'Editor',
                'email' => 'editor@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id' => 3,
                'name' => 'Designer',
                'email' => 'designer@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert('$users');
    }
}

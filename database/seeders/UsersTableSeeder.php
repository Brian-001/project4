<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
                'id' =>1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('apassword'),
                'remember_token' =>null,
            ],
            [
                'id' => 2,
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('upassword'),
                'remember_token' => null,
            ],
            // [
            //     'id' => 3,
            //     'name' => 'Designer',
            //     'email' => 'designer@gmail.com',
            //     'password' => bcrypt('dpassword'),
            //     'remember_token' => null,
            // ],
        ];

        User::insert($users);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Assign role with id 1 to user wth id 1
        User::findOrFail(1)->roles()->sync(1);

        //Assign role with id 2 to user with id 2
        User::findOrFail(2)->roles()->sync(2);
    }
}

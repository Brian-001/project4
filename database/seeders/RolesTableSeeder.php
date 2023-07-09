<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        $roles = [
            [
                'id' => 1,
                'title' => 'Admin'
            ],
            [
                'id' => 2,
                'title' => 'Editor'
            ]
            // [
            //     'id' => 3,
            //     'title' => 'Designer'
            // ]
        ];
        Role::insert($roles);
    }
}

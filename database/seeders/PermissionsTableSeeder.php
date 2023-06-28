<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        $permissions = [

            [
                'id' => 1,
                'title' => 'user_access'
            ],
            [
                'id' => 2,
                'title' => 'task_access'
            ],
            [
                'id' => 3,
                'title' => 'blog_access'
            ],
            [
                'id' => 4,
                'title' => 'photo_access'
            ]

        ];
        Permission::insert($permissions);
    }
}

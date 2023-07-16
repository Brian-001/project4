<?php

namespace Database\Seeders;


use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Retrieve all permissions from the permissions table
        $admin_permissions = Permission::all();

        //Attach all permissions  to the admin role (role_id 1)
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        //Filter out Permissions whose title starts with 'user'
        $user_permissions = $admin_permissions->filter(function($permission){
            return substr($permission->title, 0, 5) != 'user_';
        });

        //Attach filtered permission to the user role (role_id 2)
        Role::findOrFail(2)->permissions()->sync($user_permissions);
        
    }
}

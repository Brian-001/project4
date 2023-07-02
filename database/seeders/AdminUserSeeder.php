<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        /**
         * Create a new role called Administrator
         * A permission called 'manage tasks'
         * Assign administarator role
         */

        // $adminUser = User::factory()->create([
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('SecurePassword')
        // ]);
        // $adminUser->assignRole('Administrator');
    }
}

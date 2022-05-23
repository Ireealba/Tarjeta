<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'FreeUser']);
        $role3 = Role::create(['name' => 'StandardUser']);
        $role4 = Role::create(['name' => 'PremiumUser']);

        Permission::create(['name' => 'admin.home']);
        Permission::create(['name' => 'admin.users.index']);
        Permission::create(['name' => 'admin.users.create']);
        Permission::create(['name' => 'admin.users.edit']);
        Permission::create(['name' => 'admin.users.destroy']);
    }
}

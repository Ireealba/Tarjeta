<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin', 'id' => '1', 'card_number' => '10']);
        $role2 = Role::create(['name' => 'FreeUser', 'id' => '2', 'card_number' => '3']);
        $role3 = Role::create(['name' => 'StandardUser', 'id' => '3', 'card_number' => '6']);
        $role4 = Role::create(['name' => 'PremiumUser', 'id' => '4', 'card_number' => '10']);

        Permission::create(['name' => 'admin.home',
                            'description' => 'Ver el dashboard'])
                            ->assignRole($role1);
        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver listado de usuarios'])
                            ->assignRole($role1);
        Permission::create(['name' => 'admin.users.create',
                            'description' => 'Crear nuevo usuario'])
                            ->assignRole($role1);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Editar usuario'])
                            ->assignRole($role1);
        Permission::create(['name' => 'admin.users.destroy',
                            'description' => 'Eliminar usuario'])
                            ->assignRole($role1);

        $user1 = new User;
        $user1->name = 'Irene Alba Posadas';
        $user1->email = 'irene@gmail.com';
        $user1->password = bcrypt('irene2312');
        $user1->save();
        $user1->assignRole($role1);

        $user2 = new User;
        $user2->name = 'Mari Carmen';
        $user2->email = 'mc@gmail.com';
        $user2->password = bcrypt('maricarmen');
        $user2->save();
        $user2->assignRole($role2);
        
    }
}

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
        $role5 = Role::create(['name' => 'TarjetasLimite', 'id' => '5', 'card_number' => '0']);

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


        Permission::create(['name' => 'admin',
                            'description' => 'Pestaña de administrador'])
                            ->assignRole($role1);


        Permission::create(['name' => 'admin.roles.index',
                            'description' => 'Ver listado de roles'])
                            ->assignRole($role1);
                            
        Permission::create(['name' => 'admin.roles.create',
                            'description' => 'Crear nuevo rol'])
                            ->assignRole($role1);

        Permission::create(['name' => 'admin.roles.edit',
                            'description' => 'Editar rol'])
                            ->assignRole($role1);

        Permission::create(['name' => 'admin.roles.destroy',
                            'description' => 'Eliminar rol'])
                            ->assignRole($role1);


        Permission::create(['name' => 'tarjetas.index',
                            'description' => 'Ver sus tarjetas'])
                            ->assignRole($role1, $role2, $role3, $role4, $role5);

        Permission::create(['name' => 'tarjetas.create',
                            'description' => 'Crear nueva tarjeta'])
                            ->assignRole($role1, $role2, $role3, $role4);

        Permission::create(['name' => 'tarjetas.edit',
                            'description' => 'Editar sus tarjetas'])
                            ->assignRole($role1, $role2, $role3, $role4, $role5);

        Permission::create(['name' => 'tarjetas.destroy',
                            'description' => 'Eliminar sus tarjetas'])
                            ->assignRole($role1, $role2, $role3, $role4, $role5);

        $user1 = new User;
        $user1->name = 'Irene';
        $user1->email = 'irene@gmail.com';
        $user1->password = bcrypt('irene2312');
        $user1->role_id = 1;
        $user1->save();
        $user1->assignRole($role1);

        $user2 = new User;
        $user2->name = 'Mari Carmen';
        $user2->email = 'mc@gmail.com';
        $user2->password = bcrypt('maricarmen');
        $user2->role_id = 2;
        $user2->save();
        $user2->assignRole($role2);
        
    }
}

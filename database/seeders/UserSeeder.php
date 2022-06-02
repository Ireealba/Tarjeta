<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* User::create([
            'name' => 'Jose Carlos Ramirez',
            'email' => 'joseca@gmail.com',
            'password' => bcrypt('josecarlos'),            
        ])->assignRole('Admin'); */

        User::factory(4)->create();

    }
}

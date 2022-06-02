<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tarjeta;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RoleSeeder::class);
        
        User::factory(54)->create();

        $this->call(TarjetaSeeder::class);
    }
}

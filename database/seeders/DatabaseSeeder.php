<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tarjeta;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(4)->create();
        $this->call(TarjetaSeeder::class);
    }
}

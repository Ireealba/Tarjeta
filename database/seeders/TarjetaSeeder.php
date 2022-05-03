<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use App\Models\Tarjeta;

class TarjetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarjetas = Tarjeta::factory(4)->create();

        foreach($tarjetas as $tarjeta){
            Image::factory(1)->create([
                'tarjeta_id' => $tarjeta->id
            ]);
        }


    }
}

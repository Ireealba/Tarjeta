<?php

namespace Database\Factories;

use App\Models\Tarjeta;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->image('public/storage', 640, 640, null, true)            
        ];
    }
}

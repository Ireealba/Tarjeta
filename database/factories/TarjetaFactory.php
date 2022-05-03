<?php

namespace Database\Factories;

use App\Models\Tarjeta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TarjetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'last_name' => $this->faker->sentence(),
            'description' => $this->faker->text(10),
            'puesto_trabajo' => $this->faker->sentence(),
            'empresa' => $this->faker->word(),
            'tlf1' => $this->faker->phoneNumber(),
            'tlf2' => $this->faker->phoneNumber(),
            'tlf3' => $this->faker->phoneNumber(),
            'email1' => $this->faker->email(),
            'email2' => $this->faker->email(),
            'email3' => $this->faker->email(),
            'location' => $this->faker->sentence(),            
            'social1' => $this->faker->word(),
            'social2' => $this->faker->word(),
            'social3' => $this->faker->word(),
            'website1' => $this->faker->sentence(),
            'website2' => $this->faker->sentence(),
            'website3' => $this->faker->sentence(),           
            'user_id' => User::all()->random()->id,
            'name_tarjeta' => $this->faker->sentence()
            
        ];
    }
}

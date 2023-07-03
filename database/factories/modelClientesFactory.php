<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\modelClientes>
 */
class modelClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'                 =>$this->faker->name,
            'telefono'               =>$this->faker->phoneNumber,
            'correo'                 =>$this->faker->unique()->safeEmail(),
            'direccion'              =>$this->faker->address,
        ];

       
    }
    public function cliente (){
        return $this->belongsTo('App\Models\modelClientes','idCliente','idCliente');
    }
}

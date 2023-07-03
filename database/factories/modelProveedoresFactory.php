<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\modelProveedores>
 */
class modelProveedoresFactory extends Factory
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
    public function proveedor (){
        return $this->belongsTo('App\Models\modelProveedores','idProveedor','idProveedor');
    }
}

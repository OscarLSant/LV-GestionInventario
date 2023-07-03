<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\modelCategorias>
 */
class modelCategoriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'        =>$this->faker->name,
            ];
    }

    public function producto (){
        return $this->belongsTo('App\Models\modelCategorias','idCategoria','idCategoria');
    }
}
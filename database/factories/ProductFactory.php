<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => fake()->words(5, true),
            'tipo' => fake()->randomElement(['Audio', 'Video', 'Juegos', 'Accesorio', 'Extensión']),
            'costo' => fake()->randomFloat(2, 10, 9999),
            'cantidad' => fake()->randomNumber(4),
        ];
    }
}

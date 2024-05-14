<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cupcake>
 */
class CupcakeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image' => fake()->imageUrl(360, 360, 'animals', true, 'cats'),
            'quantity' => fake()->numberBetween(),
            'price' => fake()->randomFloat(2, 3, 9),
            'is_available' => true,
            'is_advertised' => true,
        ];
    }
}

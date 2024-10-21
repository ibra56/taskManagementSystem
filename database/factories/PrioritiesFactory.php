<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Priorities>
 */
class PrioritiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'level' => fake()->numberBetween(1, 3),
        ];
    }
}

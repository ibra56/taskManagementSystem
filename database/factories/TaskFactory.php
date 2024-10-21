<?php

namespace Database\Factories;

use App\Models\Priorities;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
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
            'title' => fake()->words(1, true),
            'description' => fake()->sentence(),
            'category_id' => Category::factory(),
            'priorities_id' => Priorities::factory(),
            'status' => fake()->randomElement(['pending', 'in-progress', 'completed']),
            'deadline' => fake()->dateTimeBetween( 'now', '+1 year' ),
            'user_id' => \App\Models\User::all()->random()
        ];
    }
}

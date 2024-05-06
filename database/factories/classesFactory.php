<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\classes>
 */
class classesFactory extends Factory
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
            'start_time' => fake()->time('H:i:s', '08:00:00'),
            'end_time' => fake()->time('H:i:s', '20:00:00'),
            'creditHours' => fake()->numberBetween(2,4),
            'teacher_id' => fake()->numberBetween(1, 10)
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Time>
 */
class TimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1, // Crea un usuario si es necesario
            'level_id' => $this->faker->numberBetween(1, 8),
            'time' => $this->faker->numberBetween(1000, 10000),
            'completed' => $this->faker->boolean()
        ];
    }
}

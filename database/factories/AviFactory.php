<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avi>
 */
class AviFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'points' => $this->faker->numberBetween(1, 20),
            'idf' => $this->faker->numberBetween(1, 10),
            'ide' => $this->faker->numberBetween(1, 10),
        ];
    }
}

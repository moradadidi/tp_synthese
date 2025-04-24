<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'dateNaissance' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'idclasse' => $this->faker->numberBetween(1, 10),
        ];
    }
}

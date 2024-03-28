<?php

namespace Database\Factories;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilisateur>
 */
class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->sentence(),
            'prenom' => $this->faker->sentence(),
            'password' => $this->faker->sentence(),
            'role' => $this->faker->sentence(),
            'created_at' => now(),
            'region_id' => Region::pluck('id')->random(),
        ];
    }
}

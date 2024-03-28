<?php

namespace Database\Factories;

use App\Models\TypeCompteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compteur>
 */
class CompteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'moyConsommation' => $this->faker->randomFloat(),
            'numSerie' => $this->faker->randomNumber(),
            'modele' => $this->faker->sentence(),
            'dateInstallation' => $this->faker->date(),
            'marque' => $this->faker->sentence(),
            'typecompteur_id' => TypeCompteur::get('id')->random(),
            'created_at' => now(),
        ];
    }
}

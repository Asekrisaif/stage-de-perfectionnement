<?php

namespace Database\Factories;

use App\Models\Compteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facture>
 */
class FactureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'montantFacture' => $this->faker->randomFloat(),
            'periode' => $this->faker->randomNumber(),
            'adresse' => $this->faker->address(),
            'nomClient' => $this->faker->sentence(),
            'adresseClient' => $this->faker->address(),
            'dateFacture' => $this->faker->date(),
            'dateDebutConsommation' => $this->faker->date(),
            'dateFinConsommation' => $this->faker->date(),
            'prixUnitaire' => $this->faker->randomFloat(),
            'montantHorsTaxes' => $this->faker->randomFloat(),
            'totaleTaxes' => $this->faker->randomFloat(),
            'montantTotale' => $this->faker->randomFloat(),
            'dateLimitePaiement' => $this->faker->date(),
            'compteur_id' => Compteur::get('id')->random(),
            'created_at' => now(),
        ];
    }
}

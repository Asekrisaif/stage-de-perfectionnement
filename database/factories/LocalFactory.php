<?php

namespace Database\Factories;

use App\Models\Famille;
use App\Models\Region;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Local>
 */
class LocalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nomLocal' => $this->faker->sentence(),
            'adresseLocal' => $this->faker->address(),
            'contactLocal' => $this->faker->randomNumber(),
            'created_at' => now(),
            'region_id' => Region::get('id')->random(),
            'utilisateur_id' =>Utilisateur::get('id')->random(),
            'famille_id' =>Famille::get('id')->random(),
        ];
    }
}

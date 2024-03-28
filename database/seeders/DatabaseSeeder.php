<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Appel des seeders
        $this->call([
            RegionSeeder::class,
            TypeCompteurSeeder::class,
            UtilisateurSeeder::class,
            FamilleSeeder::class,
            LocalSeeder::class,
            CompteurSeeder::class,
            FactureSeeder::class,
        ]);

        // Vous pouvez également utiliser les factories pour générer des données de test
        // Exemple : \App\Models\User::factory(10)->create();

        // Vous pouvez également utiliser la factory pour créer un utilisateur spécifique
        // Exemple : \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

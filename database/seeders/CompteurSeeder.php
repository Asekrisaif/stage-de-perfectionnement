<?php

namespace Database\Seeders;

use App\Models\Compteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Compteur::factory()->count(10)->create();
    }
}

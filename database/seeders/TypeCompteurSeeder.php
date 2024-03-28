<?php

namespace Database\Seeders;

use App\Models\TypeCompteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeCompteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TypeCompteur::factory()->count(10)->create();
    }
}

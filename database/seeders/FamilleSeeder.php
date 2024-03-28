<?php

namespace Database\Seeders;

use App\Models\Famille;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Famille::factory()->count(10)->create();
    }
}

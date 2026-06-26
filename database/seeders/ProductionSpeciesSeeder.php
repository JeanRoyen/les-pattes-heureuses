<?php

namespace Database\Seeders;

use App\Models\Specie;
use App\Models\Species;
use Illuminate\Database\Seeder;

class ProductionSpeciesSeeder extends Seeder
{
    public function run(): void
    {
        $species = [
            [
                'id' => 1,
                'name' => 'Chien',
            ],
            [
                'id' => 2,
                'name' => 'Chat',
            ],
            [
                'id' => 3,
                'name' => 'Lapin',
            ],
            [
                'id' => 4,
                'name' => 'Furet',
            ],
            [
                'id' => 5,
                'name' => 'Cochon d’Inde',
            ],
        ];

        foreach ($species as $specie) {
            Specie::firstOrCreate([
                'name' => $specie['name'],
                'id' => $specie['id'],
                ]
            );
        }
    }
}

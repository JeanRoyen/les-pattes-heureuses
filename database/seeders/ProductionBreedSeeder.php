<?php

namespace Database\Seeders;

use App\Models\Breed;
use App\Models\Specie;
use Illuminate\Database\Seeder;

class ProductionBreedSeeder extends Seeder
{
    public function run(): void
    {
        $breeds = [
            // Chiens (specie_id = 1)
            [
                'name' => 'Berger Allemand',
                'specie_id' => 1,
            ],
            [
                'name' => 'Labrador Retriever',
                'specie_id' => 1,
            ],
            [
                'name' => 'Golden Retriever',
                'specie_id' => 1,
            ],
            [
                'name' => 'Cavalier King Charles',
                'specie_id' => 1,
            ],
            [
                'name' => 'Border Collie',
                'specie_id' => 1,
            ],
            [
                'name' => 'Beagle',
                'specie_id' => 1,
            ],
            [
                'name' => 'Bouledogue Français',
                'specie_id' => 1,
            ],
            [
                'name' => 'Husky Sibérien',
                'specie_id' => 1,
            ],

            // Chats (specie_id = 2)
            [
                'name' => 'Européen',
                'specie_id' => 2,
            ],
            [
                'name' => 'Maine Coon',
                'specie_id' => 2,
            ],
            [
                'name' => 'Siamois',
                'specie_id' => 2,
            ],
            [
                'name' => 'Persan',
                'specie_id' => 2,
            ],
            [
                'name' => 'British Shorthair',
                'specie_id' => 2,
            ],
            [
                'name' => 'Ragdoll',
                'specie_id' => 2,
            ],

            // Lapins (specie_id = 3)
            [
                'name' => 'Bélier',
                'specie_id' => 3,
            ],
            [
                'name' => 'Nain',
                'specie_id' => 3,
            ],
            [
                'name' => 'Géant des Flandres',
                'specie_id' => 3,
            ],

            // Furets (specie_id = 4)
            [
                'name' => 'Furet domestique',
                'specie_id' => 4,
            ],

            // Cochons d’Inde (specie_id = 5)
            [
                'name' => 'Shelty',
                'specie_id' => 5,
            ],
            [
                'name' => 'Péruvien',
                'specie_id' => 5,
            ],
            [
                'name' => 'Abyssin',
                'specie_id' => 5,
            ],
        ];

        foreach ($breeds as $breed) {
            Breed::firstOrCreate([
                'name' => $breed['name'],
                'specie_id' => $breed["specie_id"]
            ]);
        }
    }
}

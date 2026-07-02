<?php

namespace Database\Seeders;

use App\Models\Adoption;
use App\Models\Animal;
use Illuminate\Database\Seeder;

class ProductionAdoptionSeeder extends Seeder
{
    public function run(): void
    {
        $requests = [
            [
                'animal_id' => 1,
                'name' => 'Jean Dupont',
                'phone' => '0471 12 34 56',
                'email' => 'jean.dupont@example.be',
                'message' => 'Nous recherchons un compagnon pour notre famille. Nous avons un jardin clôturé et beaucoup de temps à lui consacrer.',
                'status' => 'waiting',
            ],
            [
                'animal_id' => 2,
                'name' => 'Sophie Martin',
                'phone' => '0486 45 78 91',
                'email' => 'sophie.martin@example.be',
                'message' => 'J’ai déjà eu plusieurs chiens et je souhaite adopter un Labrador pour m’accompagner lors de mes promenades quotidiennes.',
                'status' => 'accepted',
            ],
            [
                'animal_id' => 6,
                'name' => 'Thomas Leroy',
                'phone' => '0492 88 17 54',
                'email' => 'thomas.leroy@example.be',
                'message' => 'Je vis en appartement et je recherche un chat calme et affectueux.',
                'status' => 'waiting',
            ],
            [
                'animal_id' => 7,
                'name' => 'Émilie Bernard',
                'phone' => '0477 63 25 18',
                'email' => 'emilie.bernard@example.be',
                'message' => 'Notre précédent chat nous a quittés récemment et nous aimerions offrir un nouveau foyer à un animal.',
                'status' => 'accepted',
            ],
            [
                'animal_id' => 11,
                'name' => 'Lucas Fontaine',
                'phone' => '0484 91 32 77',
                'email' => 'lucas.fontaine@example.be',
                'message' => 'Nous possédons déjà un lapin et souhaitons lui trouver un compagnon compatible.',
                'status' => 'waiting',
            ],
            [
                'animal_id' => 13,
                'name' => 'Marie Dubois',
                'phone' => '0495 26 41 83',
                'email' => 'marie.dubois@example.be',
                'message' => 'J’ai beaucoup d’espace et de temps pour m’occuper d’un grand lapin. Je suis très motivée.',
                'status' => 'accepted',
            ],
            [
                'animal_id' => 15,
                'name' => 'Antoine Lambert',
                'phone' => '0474 55 20 11',
                'email' => 'antoine.lambert@example.be',
                'message' => 'Je me suis renseigné sur les besoins des furets et je pense pouvoir leur offrir un environnement adapté.',
                'status' => 'refused',
            ],
            [
                'animal_id' => 17,
                'name' => 'Camille Petit',
                'phone' => '0488 71 90 42',
                'email' => 'camille.petit@example.be',
                'message' => 'Mes enfants souhaitent adopter un cochon d’Inde. Nous avons déjà tout l’équipement nécessaire.',
                'status' => 'waiting',
            ],
            [
                'animal_id' => 18,
                'name' => 'Nicolas Renard',
                'phone' => '0491 33 62 84',
                'email' => 'nicolas.renard@example.be',
                'message' => 'Je travaille principalement à domicile et pourrai consacrer beaucoup de temps à l’animal.',
                'status' => 'available',
            ],
            [
                'animal_id' => 5,
                'name' => 'Claire Moreau',
                'phone' => '0473 80 14 95',
                'email' => 'claire.moreau@example.be',
                'message' => 'Je pratique régulièrement la randonnée et cherche un chien actif qui pourra m’accompagner.',
                'status' => 'waiting',
            ],
        ];

        foreach ($requests as $request) {
            Adoption::firstOrCreate([
               'animal_id' =>$request['animal_id'],
               'name' =>$request['name'],
               'phone' =>$request['phone'],
               'email' =>$request['email'],
               'message' =>$request['message'],
               'status' =>$request['status'],
            ]);
        }
    }
}

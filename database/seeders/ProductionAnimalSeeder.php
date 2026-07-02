<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Breed;
use Illuminate\Database\Seeder;

class ProductionAnimalSeeder extends Seeder
{
    public function run(): void
    {
        $animals = [
            [
                'name' => 'Max',
                'specie_id' => 1,
                'breed_id' => 1, // Berger Allemand
                'age' => now()->subYears(4),
                'gender' => true,
                'vaccine' => true,
                'status' => 'waiting',
                'description' => 'Chien loyal et protecteur, apprécie les longues promenades.',
            ],
            [
                'name' => 'Luna',
                'specie_id' => 1,
                'breed_id' => 2, // Labrador Retriever
                'age' => now()->subYears(2),
                'gender' => false,
                'vaccine' => true,
                'status' => 'available',
                'description' => 'Très sociable, adore les enfants et les jeux d’eau.',
            ],
            [
                'name' => 'Rocky',
                'specie_id' => 1,
                'breed_id' => 3, // Golden Retriever
                'age' => now()->subYears(5),
                'gender' => true,
                'vaccine' => true,
                'status' => 'available',
                'description' => 'Calme et affectueux, parfait compagnon de famille.',
            ],
            [
                'name' => 'Bella',
                'specie_id' => 1,
                'breed_id' => 5, // Border Collie
                'age' => now()->subYears(3),
                'gender' => false,
                'vaccine' => true,
                'status' => 'available',
                'description' => 'Très intelligente, a besoin d’activité quotidienne.',
            ],
            [
                'name' => 'Oscar',
                'specie_id' => 1,
                'breed_id' => 8, // Husky Sibérien
                'age' => now()->subYears(4),
                'gender' => true,
                'vaccine' => false,
                'status' => 'in_care',
                'description' => 'Énergique et joueur, adore courir.',
            ],
            [
                'name' => 'Milo',
                'specie_id' => 2,
                'breed_id' => 9, // Européen
                'age' => now()->subYears(2),
                'gender' => true,
                'vaccine' => true,
                'status' => 'available',
                'description' => 'Chat curieux et câlin.',
            ],
            [
                'name' => 'Nala',
                'specie_id' => 2,
                'breed_id' => 10, // Maine Coon
                'age' => now()->subYears(3),
                'gender' => false,
                'vaccine' => true,
                'status' => 'waiting',
                'description' => 'Grande chatte douce et très attachante.',
            ],
            [
                'name' => 'Simba',
                'specie_id' => 2,
                'breed_id' => 11, // Siamois
                'age' => now()->subYear(),
                'gender' => true,
                'vaccine' => true,
                'status' => 'in_care',
                'description' => 'Très bavard et proche de l’humain.',
            ],
            [
                'name' => 'Choupette',
                'specie_id' => 2,
                'breed_id' => 12, // Persan
                'age' => now()->subYears(6),
                'gender' => false,
                'vaccine' => true,
                'status' => 'waiting',
                'description' => 'Calme et élégante, aime les endroits tranquilles.',
            ],
            [
                'name' => 'Tigrou',
                'specie_id' => 2,
                'breed_id' => 14, // Ragdoll
                'age' => now()->subYears(4),
                'gender' => true,
                'vaccine' => false,
                'status' => 'waiting',
                'description' => 'Très affectueux, adore être porté.',
            ],
            [
                'name' => 'Cookie',
                'specie_id' => 3,
                'breed_id' => 15, // Bélier
                'age' => now()->subMonths(10),
                'gender' => false,
                'vaccine' => true,
                'status' => 'waiting',
                'description' => 'Lapine douce habituée à la vie en intérieur.',
            ],
            [
                'name' => 'Caramel',
                'specie_id' => 3,
                'breed_id' => 16, // Nain
                'age' => now()->subYears(2),
                'gender' => true,
                'vaccine' => true,
                'status' => 'waiting',
                'description' => 'Petit lapin très joueur.',
            ],
            [
                'name' => 'Goliath',
                'specie_id' => 3,
                'breed_id' => 17, // Géant des Flandres
                'age' => now()->subYears(3),
                'gender' => true,
                'vaccine' => true,
                'status' => 'in_care',
                'description' => 'Impressionnant par sa taille mais extrêmement gentil.',
            ],
            [
                'name' => 'Neige',
                'specie_id' => 3,
                'breed_id' => 15, // Bélier
                'age' => now()->subYear(),
                'gender' => false,
                'vaccine' => false,
                'status' => 'waiting',
                'description' => 'Adore les caresses et les légumes frais.',
            ],
            [
                'name' => 'Bandit',
                'specie_id' => 4,
                'breed_id' => 18, // Furet domestique
                'age' => now()->subYears(2),
                'gender' => true,
                'vaccine' => true,
                'status' => 'in_care',
                'description' => 'Curieux et plein d’énergie.',
            ],
            [
                'name' => 'Moka',
                'specie_id' => 4,
                'breed_id' => 18, // Furet domestique
                'age' => now()->subYears(1),
                'gender' => false,
                'vaccine' => true,
                'status' => 'in_care',
                'description' => 'Très joueuse et sociable.',
            ],
            [
                'name' => 'Pistache',
                'specie_id' => 5,
                'breed_id' => 19, // Shelty
                'age' => now()->subMonths(18),
                'gender' => false,
                'vaccine' => true,
                'status' => 'in_care',
                'description' => 'Cochon d’Inde calme au pelage soyeux.',
            ],
            [
                'name' => 'Nougat',
                'specie_id' => 5,
                'breed_id' => 20, // Péruvien
                'age' => now()->subYears(2),
                'gender' => true,
                'vaccine' => false,
                'status' => 'in_care',
                'description' => 'Très gourmand et apprécie la compagnie.',
            ],
            [
                'name' => 'Cacahuète',
                'specie_id' => 5,
                'breed_id' => 21, // Abyssin
                'age' => now()->subYear(),
                'gender' => false,
                'vaccine' => true,
                'status' => 'in_care',
                'description' => 'Active et toujours en exploration.',
            ],
            [
                'name' => 'Flocon',
                'specie_id' => 5,
                'breed_id' => 19, // Shelty
                'age' => now()->subYears(3),
                'gender' => true,
                'vaccine' => true,
                'status' => 'waiting',
                'description' => 'Affectueux et habitué aux enfants.',
            ],
        ];

        foreach ($animals as $animal) {
            Animal::firstOrCreate([
               'name' =>$animal['name'],
               'specie_id' =>$animal['specie_id'],
               'breed_id' =>$animal['breed_id'],
               'age' =>$animal['age'],
               'gender' =>$animal['gender'],
               'vaccine' =>$animal['vaccine'],
               'status' =>$animal['status'],
               'description' =>$animal['description'],
            ]);
        }
    }
}

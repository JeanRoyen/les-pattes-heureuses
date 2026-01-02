<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Seeder;

class ProductionAnimalSeeder extends Seeder
{
    public function run(): void
    {
        $animals = [
            ["name" => "Max", "specie" => "dog", "race" => "Berger Allemand", "age" => "2020-03-15", "gender" => 1, "vaccine" => 1, "description" => "Chien loyal et protecteur, parfait pour les familles actives.", "status" => "available", "avatar" => ""],
            ["name" => "Luna", "specie" => "cat", "race" => "Européen", "age" => "2021-06-20", "gender" => 0, "vaccine" => 1, "description" => "Chatte douce et affectueuse qui adore les câlins.", "status" => "available", "avatar" => ""],
            ["name" => "Rocky", "specie" => "dog", "race" => "Berger Malinois", "age" => "2019-01-10", "gender" => 1, "vaccine" => 1, "description" => "Chien énergique qui a besoin de beaucoup d'exercice quotidien.", "status" => "adopted", "avatar" => ""],
            ["name" => "Bella", "specie" => "cat", "race" => "Siamois", "age" => "2022-08-05", "gender" => 0, "vaccine" => 0, "description" => "Jeune chatte curieuse et joueuse, très sociable avec les enfants.", "status" => "available", "avatar" => ""],
            ["name" => "Charlie", "specie" => "dog", "race" => "Cavalier king Charles", "age" => "2018-11-30", "gender" => 1, "vaccine" => 1, "description" => "Chien calme et gentil, idéal pour les personnes âgées.", "status" => "in_care", "avatar" => ""],
            ["name" => "Mimi", "specie" => "cat", "race" => "Persan", "age" => "2020-04-12", "gender" => 0, "vaccine" => 1, "description" => "Chatte élégante qui préfère les environnements calmes et paisibles.", "status" => "available", "avatar" => ""],
            ["name" => "Rex", "specie" => "dog", "race" => "Berger Allemand", "age" => "2017-09-22", "gender" => 1, "vaccine" => 1, "description" => "Chien expérimenté et bien dressé, excellent gardien de maison.", "status" => "waiting", "avatar" => ""],
            ["name" => "Nala", "specie" => "ferret", "race" => "Furet putoisé", "age" => "2023-02-14", "gender" => 0, "vaccine" => 1, "description" => "Furette joueuse et espiègle qui adore explorer son environnement.", "status" => "available", "avatar" => ""],
            ["name" => "Duke", "specie" => "dog", "race" => "Berger Malinois", "age" => "2021-07-08", "gender" => 1, "vaccine" => 0, "description" => "Chien athlétique qui excelle dans les sports canins et l'agilité.", "status" => "available", "avatar" => ""],
            ["name" => "Cleo", "specie" => "cat", "race" => "Bengal", "age" => "2022-03-25", "gender" => 0, "vaccine" => 1, "description" => "Chatte active avec un pelage magnifique, très intelligente et interactive.", "status" => "adopted", "avatar" => ""],
            ["name" => "Buddy", "specie" => "dog", "race" => "Cavalier king Charles", "age" => "2020-12-01", "gender" => 1, "vaccine" => 1, "description" => "Chien affectueux qui s'adapte bien à la vie en appartement.", "status" => "available", "avatar" => ""],
            ["name" => "Whiskers", "specie" => "cat", "race" => "Maine Coon", "age" => "2019-05-18", "gender" => 1, "vaccine" => 1, "description" => "Grand chat sociable qui s'entend bien avec les autres animaux.", "status" => "in_care", "avatar" => ""],
            ["name" => "Zeus", "specie" => "dog", "race" => "Berger Allemand", "age" => "2021-10-07", "gender" => 1, "vaccine" => 1, "description" => "Chien puissant et confiant, nécessite un propriétaire expérimenté avec les chiens.", "status" => "available", "avatar" => ""],
            ["name" => "Simba", "specie" => "ferret", "race" => "Furet albinos", "age" => "2023-06-30", "gender" => 1, "vaccine" => 0, "description" => "Furet énergique et curieux qui aime jouer avec des jouets interactifs.", "status" => "waiting", "avatar" => ""],
            ["name" => "Daisy", "specie" => "dog", "race" => "Cavalier king Charles", "age" => "2022-01-19", "gender" => 0, "vaccine" => 1, "description" => "Chienne douce et patiente, parfaite compagne pour les enfants en bas âge.", "status" => "available", "avatar" => ""],
            ["name" => "Shadow", "specie" => "cat", "race" => "Chartreux", "age" => "2020-09-11", "gender" => 1, "vaccine" => 1, "description" => "Chat discret et observateur qui apprécie les moments de tranquillité.", "status" => "adopted", "avatar" => ""],
            ["name" => "Titan", "specie" => "dog", "race" => "Berger Malinois", "age" => "2018-04-03", "gender" => 1, "vaccine" => 1, "description" => "Chien robuste et travailleur, excellent pour les activités de plein air.", "status" => "available", "avatar" => ""],
            ["name" => "Princess", "specie" => "cat", "race" => "Ragdoll", "age" => "2021-11-28", "gender" => 0, "vaccine" => 0, "description" => "Chatte docile et détendue qui adore être portée et câlinée.", "status" => "in_care", "avatar" => ""],
            ["name" => "Bruno", "specie" => "dog", "race" => "Berger Allemand", "age" => "2019-07-16", "gender" => 1, "vaccine" => 1, "description" => "Chien intelligent et obéissant, idéal pour les familles avec enfants.", "status" => "available", "avatar" => ""],
            ["name" => "Mittens", "specie" => "cat", "race" => "Scottish Fold", "age" => "2023-03-09", "gender" => 0, "vaccine" => 1, "description" => "Jeune chatte adorable avec des oreilles caractéristiques, très affectueuse.", "status" => "available", "avatar" => ""],
            ["name" => "Oscar", "specie" => "ferret", "race" => "Furet zibeline", "age" => "2022-10-21", "gender" => 1, "vaccine" => 1, "description" => "Furet sociable qui aime interagir avec les humains et jouer.", "status" => "waiting", "avatar" => ""],
            ["name" => "Bailey", "specie" => "dog", "race" => "Cavalier king Charles", "age" => "2020-05-14", "gender" => 0, "vaccine" => 1, "description" => "Chienne joyeuse et pleine d'énergie qui adore les promenades au parc.", "status" => "adopted", "avatar" => ""],
            ["name" => "Tiger", "specie" => "cat", "race" => "Abyssin", "age" => "2021-02-27", "gender" => 1, "vaccine" => 1, "description" => "Chat actif et athlétique qui aime grimper et explorer en hauteur.", "status" => "available", "avatar" => ""],
            ["name" => "Thor", "specie" => "dog", "race" => "Berger Malinois", "age" => "2022-09-05", "gender" => 1, "vaccine" => 0, "description" => "Jeune chien dynamique en plein apprentissage, plein de potentiel et d'énergie.", "status" => "in_care", "avatar" => ""],
            ["name" => "Lily", "specie" => "cat", "race" => "Birmane", "age" => "2019-12-13", "gender" => 0, "vaccine" => 1, "description" => "Chatte élégante et douce avec des yeux bleus magnifiques.", "status" => "available", "avatar" => ""],
            ["name" => "Ace", "specie" => "dog", "race" => "Berger Allemand", "age" => "2023-01-08", "gender" => 1, "vaccine" => 1, "description" => "Jeune chien plein de vie qui apprend rapidement et adore jouer.", "status" => "available", "avatar" => ""],
            ["name" => "Pepper", "specie" => "ferret", "race" => "Furet champagne", "age" => "2022-07-19", "gender" => 0, "vaccine" => 1, "description" => "Furette douce et câline qui s'entend bien avec les autres animaux.", "status" => "available", "avatar" => ""],
            ["name" => "Molly", "specie" => "dog", "race" => "Cavalier king Charles", "age" => "2021-04-23", "gender" => 0, "vaccine" => 1, "description" => "Chienne calme et affectueuse, compagne idéale pour tous les âges.", "status" => "waiting", "avatar" => ""],
            ["name" => "Felix", "specie" => "cat", "race" => "British Shorthair", "age" => "2020-08-17", "gender" => 1, "vaccine" => 0, "description" => "Chat robuste et indépendant qui apprécie sa tranquillité mais reste affectueux.", "status" => "adopted", "avatar" => ""],
            ["name" => "Ranger", "specie" => "dog", "race" => "Berger Malinois", "age" => "2019-03-29", "gender" => 1, "vaccine" => 1, "description" => "Chien courageux et loyal, excellent compagnon pour les activités outdoor.", "status" => "available", "avatar" => ""],
        ];

        foreach ($animals as $animal) {
            Animal::firstOrCreate(
                ["name" => $animal["name"]],
                $animal
            );
        }
    }
}

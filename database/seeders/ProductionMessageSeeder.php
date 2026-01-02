<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class ProductionMessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            ['name' => 'Sophie', 'email' => 'sophie.martin@email.com', 'phone' => '0476123456', 'message' => 'Bonjour, je suis intéressée par l\'adoption d\'un chien de berger. Pourriez-vous me donner plus d\'informations sur les chiens disponibles ?', 'received' => 1, 'title' => 'Demande d\'information sur adoption chien'],
            ['name' => 'Marc', 'email' => 'marc.dubois@email.com', 'phone' => '0487654321', 'message' => 'J\'aimerais faire du bénévolat dans votre refuge. Quelles sont les disponibilités et comment puis-je m\'inscrire pour aider ?', 'received' => 0, 'title' => 'Proposition de bénévolat au refuge'],
            ['name' => 'Julie', 'email' => 'julie.bernard@email.com', 'phone' => '0495876543', 'message' => 'Je cherche un chat calme pour ma grand-mère. Avez-vous des chats seniors ou particulièrement tranquilles disponibles à l\'adoption ?', 'received' => 1, 'title' => 'Recherche chat calme pour personne âgée'],
            ['name' => 'Pierre', 'email' => 'pierre.leroy@email.com', 'phone' => '0478945612', 'message' => 'Nous avons trouvé un chat errant dans notre jardin. Pouvez-vous le prendre en charge ou nous conseiller sur la marche à suivre ?', 'received' => 1, 'title' => 'Chat errant trouvé dans le quartier'],
            ['name' => 'Emma', 'email' => 'emma.moreau@email.com', 'phone' => '0486234567', 'message' => 'Quels sont les frais d\'adoption et que comprennent-ils exactement ? J\'aimerais avoir tous les détails avant de prendre ma décision.', 'received' => 0, 'title' => 'Question sur les frais d\'adoption'],
            ['name' => 'Lucas', 'email' => 'lucas.petit@email.com', 'phone' => '0479123789', 'message' => 'Je souhaite faire un don à votre association. Quelle est la meilleure façon de procéder et est-ce déductible des impôts ?', 'received' => 1, 'title' => 'Information sur les dons à l\'association'],
            ['name' => 'Camille', 'email' => 'camille.roux@email.com', 'phone' => '0497345678', 'message' => 'Mon chien adopté chez vous il y a 6 mois se porte merveilleusement bien ! Je voulais vous remercier et vous donner des nouvelles.', 'received' => 1, 'title' => 'Nouvelles d\'un animal adopté - Merci'],
            ['name' => 'Thomas', 'email' => 'thomas.garcia@email.com', 'phone' => '0485567890', 'message' => 'Je déménage à l\'étranger et ne peux malheureusement plus garder mon furet. Acceptez-vous les animaux dans cette situation ?', 'received' => 0, 'title' => 'Demande de prise en charge furet'],
            ['name' => 'Laura', 'email' => 'laura.martinez@email.com', 'phone' => '0476789012', 'message' => 'J\'ai vu sur votre site un Cavalier King Charles qui m\'intéresse beaucoup. Est-il toujours disponible et puis-je venir le rencontrer ce weekend ?', 'received' => 1, 'title' => 'Rendez-vous pour rencontrer un Cavalier'],
            ['name' => 'Alexandre', 'email' => 'alex.laurent@email.com', 'phone' => '0498234901', 'message' => 'Je suis vétérinaire et souhaiterais proposer mes services bénévolement une fois par mois. Comment puis-je contribuer à votre mission ?', 'received' => 0, 'title' => 'Proposition services vétérinaires bénévoles'],
        ];

        foreach ($messages as $message) {
            Message::firstOrCreate(
                ['email' => $message['email'], 'title' => $message['title']],
                $message
            );
        }
    }
}

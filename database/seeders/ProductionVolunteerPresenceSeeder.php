<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VolunteerPresence;
use Illuminate\Database\Seeder;

class ProductionVolunteerPresenceSeeder extends Seeder
{
    public function run(): void
    {
        $presences = [
            'thomas@benevole.com' => ['monday', 'wednesday', 'saturday'],
            'sophie@benevole.com' => ['tuesday', 'thursday'],
            'lucas@benevole.com' => ['monday', 'friday', 'sunday'],
            'camille@benevole.com' => ['wednesday', 'thursday', 'saturday'],
            'nicolas@benevole.com' => ['tuesday', 'friday'],
        ];

        foreach ($presences as $email => $days) {
            $user = User::where('email', $email)->first();

            VolunteerPresence::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'monday' => in_array('monday', $days),
                    'tuesday' => in_array('tuesday', $days),
                    'wednesday' => in_array('wednesday', $days),
                    'thursday' => in_array('thursday', $days),
                    'friday' => in_array('friday', $days),
                    'saturday' => in_array('saturday', $days),
                    'sunday' => in_array('sunday', $days),
                ]
            );
        }
    }
}

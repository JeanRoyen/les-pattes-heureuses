<?php

namespace Database\Factories;

use App\Models\VolunteerPresence;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VolunteerPresenceFactory extends Factory
{
    protected $model = VolunteerPresence::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

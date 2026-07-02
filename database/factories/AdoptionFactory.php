<?php

namespace Database\Factories;

use App\Models\Adoption;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AdoptionFactory extends Factory
{
    protected $model = Adoption::class;

    public function definition(): array
    {
        return [
            'animal_id' => $this->faker->randomDigitNotNull(),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'message' => $this->faker->word(),
            'status' => $this->faker->randomElement(['waiting', 'accepted', 'refused', 'available']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

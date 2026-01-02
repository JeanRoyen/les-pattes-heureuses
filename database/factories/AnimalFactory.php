<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Animal::class;

    public function definition(): array
    {

        return [
            'name' => fake()->firstName(),
            'specie' => fake()->randomElement(['dog', 'cat', 'ferret']),
            'race' => fake()->randomElement(['Berger Allemand', 'Berger Malinois', 'Cavalier king Charles']),
            'age' => fake()->dateTimeBetween('-15 years', 'now'),
            'gender' => fake()->boolean(),
            'vaccine' => fake()->boolean(),
            'description' => fake()->sentence(8),
            'status' => fake()->randomElement(['available', 'adopted', 'in_care', 'waiting']),
            'avatar' => '',
        ];
    }
}

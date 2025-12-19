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
            'name' => $this->faker->firstName(),
            'specie' => $this->faker->randomElement(['dog', 'cat', 'ferret']),
            'race' => $this->faker->word(),
            'age' => $this->faker->dateTimeBetween('-15 years', 'now'),
            'gender' => $this->faker->boolean(),
            'vaccine' => $this->faker->boolean(),
            'description' => $this->faker->sentence(8),
            'status' => $this->faker->randomElement(['available', 'adopted', 'in_care', 'waiting']),
            'avatar' => $this->faker->imageUrl(200, 200, 'animals', true),
        ];
    }
}

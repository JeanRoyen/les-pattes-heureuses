<?php

use App\Models\Animal;
use App\Models\Breed;
use function Pest\Laravel\get;

beforeEach(function () {
    Breed::factory()->create([
        'id' => 1,
        'name' => 'Berger Allemand',
    ]);
});

it('displays animals page correctly', function () {
    get(route('animals'))
        ->assertOk();
});


it('displays animal name', function () {
    Animal::factory()->create([
        'name' => 'Max',
        'status' => 'available',
    ]);

    get(route('animals'))
        ->assertSee('Max');
});

it('displays animal description', function () {
    Animal::factory()->create([
        'description' => 'Un chien très gentil',
        'status' => 'available',
    ]);

    get(route('animals'))
        ->assertSee('Un chien très gentil');
});

it('displays animal breed name instead of id', function () {
    Animal::factory()->create([
        'breed_id' => 1,
        'status' => 'available',
    ]);

    get(route('animals'))
        ->assertSee('Berger Allemand');
});

it('displays animal gender correctly', function () {
    Animal::factory()->create([
        'gender' => 1,
        'status' => 'available',
    ]);

    get(route('animals'))
        ->assertSee('Mâle');
});

it('formats animal age correctly', function () {
    Animal::factory()->create([
        'age' => '2025-03-24 00:00:00',
        'status' => 'available',
    ]);

    get(route('animals'))
        ->assertSee('24/03/2025');
});

it('displays full animal card information', function () {
    Animal::factory()->create([
        'status' => 'available',
        'age' => '2025-01-15 00:00:00',
        'name' => 'Charlie',
        'description' => 'Chien adorable',
        'breed_id' => 1,
        'gender' => 1,
    ]);

    get(route('animals'))
        ->assertSee('15/01/2025')
        ->assertSee('Charlie')
        ->assertSee('Chien adorable')
        ->assertSee('Berger Allemand')
        ->assertSee('Mâle');
});

it('displays multiple animal cards', function () {
    Animal::factory()->count(3)->create();

    get(route('animals'))
        ->assertOk();
});

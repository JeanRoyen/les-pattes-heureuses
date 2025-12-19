<?php

use App\Models\Animal;
use function Pest\Laravel\get;

it('displays animals page correctly', function () {
    get(route('pages.animals-list'))
        ->assertStatus(200)
        ->assertViewIs('pages.animal-list.index');
});

it('displays animal avatar', function () {
    Animal::factory()->create([
        'status' => 'available',
        'avatar' => 'animals/dog.jpg',
    ]);

    get(route('pages.animals-list'))
        ->assertSee('animals/dog.jpg');
});


it('displays animal age', function () {
    Animal::factory()->create([
        'status' => 'available',
        'age' => '2025-03-24 00:00:00',
    ]);

    get(route('pages.animals-list'))
        ->assertSee('24/03/2025');
});


it('displays animal name', function () {
    Animal::factory()->create([
        'status' => 'available',
        'name' => 'Max',
    ]);

    get(route('pages.animals-list'))
        ->assertSee('Max');
});


it('displays animal race', function () {
    $animal = Animal::factory()->create([
        'status' => 'available',
        'race' => 'Berger Allemand'
    ]);

    get(route('pages.animals-list'))
        ->assertSee('Berger Allemand');
});

it('displays animal description', function () {
    $animal = Animal::factory()->create([
        'status' => 'available',
        'description' => 'Un chien très gentil'
    ]);

    get(route('pages.animals-list'))
        ->assertSee('Un chien très gentil');
});

it('displays animal gender', function () {
    $animal = Animal::factory()->create([
        'status' => 'available',
        'gender' => 1
    ]);

    get(route('pages.animals-list'))
        ->assertSee('Mâle');
});

it('displays all animal information in card', function () {
    $animal = Animal::factory()->create([
        'status' => 'available',
        'avatar' => 'animals/test.jpg',
        'age' => '2025-01-15 00:00:00',
        'name' => 'Charlie',
        'race' => 'Golden Retriever',
        'description' => 'Chien adorable'
    ]);

    get(route('pages.animals-list'))
        ->assertSee('animals/test.jpg')
        ->assertSee('15/01/2025')
        ->assertSee('Charlie')
        ->assertSee('Golden Retriever')
        ->assertSee('Chien adorable');
});

it('displays multiple animal cards', function () {
    Animal::factory()->count(3)->create();

    get(route('pages.animals-list'))
        ->assertStatus(200);
});

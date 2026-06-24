<?php

use App\Models\Animal;
use function Pest\Laravel\get;

it('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


it('displays animals page correctly', function () {
    $this->get(route('welcome'))
        ->assertStatus(200)
        ->assertViewIs('pages.client.welcome');
});

it('displays animal avatar', function () {
    Animal::factory()->create([
        'status' => 'available',
        'avatar' => 'animals/dog.jpg',
    ]);

    get(route('welcome'))
        ->assertSee('animals/dog.jpg');
});


it('displays animal age', function () {
    Animal::factory()->create([
        'status' => 'available',
        'age' => '2025-03-24 00:00:00',
    ]);

    get(route('welcome'))
        ->assertSee('24/03/2025');
});


it('displays animal name', function () {
    Animal::factory()->create([
        'status' => 'available',
        'name' => 'Max',
    ]);

    get(route('welcome'))
        ->assertSee('Max');
});


it('displays animal race', function () {
    $animal = Animal::factory()->create([
        'status' => 'available',
        'race' => 'Berger Allemand'
    ]);

    get(route('welcome'))
        ->assertSee('Berger Allemand');
});

it('displays animal description', function () {
    $animal = Animal::factory()->create([
        'status' => 'available',
        'description' => 'Un chien très gentil'
    ]);

    get(route('welcome'))
        ->assertSee('Un chien très gentil');
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

    get(route('welcome'))
        ->assertSee('animals/test.jpg')
        ->assertSee('15/01/2025')
        ->assertSee('Charlie')
        ->assertSee('Golden Retriever')
        ->assertSee('Chien adorable');
});

it('displays multiple animal cards', function () {
    Animal::factory()->count(4)->create();

    get(route('welcome'))
        ->assertStatus(200);
});


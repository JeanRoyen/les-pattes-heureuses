<?php

use App\Models\Animal;
use App\Models\Breed;
use App\Models\Specie;
use function Pest\Laravel\get;

it('returns welcome page successfully', function () {
    get(route('welcome'))
        ->assertStatus(200)
        ->assertViewIs('pages.client.welcome');
});

it('displays animal name', function () {

    $specie = Specie::factory()->create(['name' => 'Chien']);

    $breed = Breed::factory()->create([
        'name' => 'Berger Allemand',
        'specie_id' => $specie->id,
    ]);

    Animal::factory()->create([
        'name' => 'Max',
        'status' => 'available',
        'breed_id' => $breed->id,
        'specie_id' => $specie->id,
    ]);

    get(route('welcome'))
        ->assertSee('Max');
});

it('displays animal age formatted', function () {

    $specie = Specie::factory()->create(['name' => 'Chien']);

    $breed = Breed::factory()->create([
        'name' => 'Berger Allemand',
        'specie_id' => $specie->id,
    ]);

    Animal::factory()->create([
        'status' => 'available',
        'age' => '2025-03-24 00:00:00',
        'breed_id' => $breed->id,
        'specie_id' => $specie->id,
    ]);

    get(route('welcome'))
        ->assertSee('24/03/2025');
});

it('displays animal breed', function () {

    $specie = Specie::factory()->create(['name' => 'Chien']);

    $breed = Breed::factory()->create([
        'name' => 'Berger Allemand',
        'specie_id' => $specie->id,
    ]);

    Animal::factory()->create([
        'status' => 'available',
        'breed_id' => $breed->id,
        'specie_id' => $specie->id,
    ]);

    get(route('welcome'))
        ->assertSee('Berger Allemand');
});

it('displays animal description', function () {

    $specie = Specie::factory()->create(['name' => 'Chien']);

    $breed = Breed::factory()->create([
        'name' => 'Berger Allemand',
        'specie_id' => $specie->id,
    ]);

    Animal::factory()->create([
        'status' => 'available',
        'description' => 'Un chien très gentil',
        'breed_id' => $breed->id,
        'specie_id' => $specie->id,
    ]);

    get(route('welcome'))
        ->assertSee('Un chien très gentil');
});

it('displays multiple animal cards', function () {

    $specie = Specie::factory()->create(['name' => 'Chien']);

    $breed = Breed::factory()->create([
        'name' => 'Berger Allemand',
        'specie_id' => $specie->id,
    ]);

    Animal::factory()->count(4)->create([
        'status' => 'available',
        'breed_id' => $breed->id,
        'specie_id' => $specie->id,
    ]);

    get(route('welcome'))
        ->assertOk();
});

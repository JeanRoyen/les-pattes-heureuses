<?php

use App\Models\Animal;
use Livewire\Livewire;

it('renders successfully animals admin', function () {
    Livewire::test('pages::animal.index')
        ->assertStatus(200);
});

it('assert animal name exist on page', function () {
    Animal::factory()->create(['name' => 'Bob']);
    Animal::factory()->create(['name' => 'Ferdinand']);
    Livewire::test('pages::animal.index')
        ->assertSee('Bob')->assertSee('Ferdinand');
});

it('assert animal specie exist on page', function () {
    Animal::factory()->create(['race' => 'Berger Allemand']);
    Animal::factory()->create(['race' => 'Berger Australien']);
    Livewire::test('pages::animal.index')
        ->assertSee('Berger Allemand')->assertSee('Berger Australien');
});

it('assert animal description exist on page', function () {
    Animal::factory()->create(['description' => 'Bob est un berger Allemand']);
    Animal::factory()->create(['description' => 'Ferdinand est un berger Australien']);
    Livewire::test('pages::animal.index')
        ->assertSee('Bob est un berger Allemand')->assertSee('Ferdinand est un berger Australien');
});

it('assert animal gender exist on page', function () {
    Animal::factory()->create(['gender' => true]);
    Animal::factory()->create(['gender' => false]);
    Livewire::test('pages::animal.index')
        ->assertSee('Mâle')->assertSee('Femelle');
});

it('assert animal status exist on page', function () {
    Animal::factory()->create(['status' => 'Disponible']);
    Animal::factory()->create(['status' => 'En attente']);
    Livewire::test('pages::animal.index')
        ->assertSee('Disponible')->assertSee('En attente');
});

it('assert animal vaccine exist on page', function () {
    Animal::factory()->create(['vaccine' => 'À jour']);
    Animal::factory()->create(['vaccine' => 'À faire']);
    Livewire::test('pages::animal.index')
        ->assertSee('À jour')->assertSee('À faire');
});

it('assert animal age exist on page', function () {
    Animal::factory()->create(['age' => '2025-03-24 00:00:00']);
    Animal::factory()->create(['age' => '2023-03-24 00:00:00']);
    Livewire::test('pages::animal.index')
        ->assertSee('24/03/2025')->assertSee('24/03/2023');
});

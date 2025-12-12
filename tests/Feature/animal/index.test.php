<?php

use App\Models\Animal;
use Livewire\Livewire;

it('renders successfully animals admin', function () {
    Livewire::test('pages::animal.index')
        ->assertStatus(200);
});


// Tests for adopted animals
it('assert animal name exist on page', function () {
    Animal::factory()->create(['name' => 'Bob', 'status' => 'adopted']);
    Animal::factory()->create(['name' => 'Ferdinand', 'status' => 'adopted']);
    Livewire::test('pages::animal.index')
        ->assertSee('Bob')->assertSee('Ferdinand');
});

it('assert animal specie exist on page', function () {
    Animal::factory()->create(['race' => 'Berger Allemand', 'status' => 'adopted']);
    Animal::factory()->create(['race' => 'Berger Australien', 'status' => 'adopted']);
    Livewire::test('pages::animal.index')
        ->assertSee('Berger Allemand')->assertSee('Berger Australien');
});

it('assert animal description exist on page', function () {
    Animal::factory()->create(['description' => 'Bob est un berger Allemand', 'status' => 'adopted']);
    Animal::factory()->create(['description' => 'Ferdinand est un berger Australien', 'status' => 'adopted']);
    Livewire::test('pages::animal.index')
        ->assertSee('Bob est un berger Allemand')->assertSee('Ferdinand est un berger Australien');
});

it('assert animal gender exist on page', function () {
    Animal::factory()->create(['gender' => true, 'status' => 'adopted']);
    Animal::factory()->create(['gender' => false, 'status' => 'adopted']);
    Livewire::test('pages::animal.index')
        ->assertSee('Mâle')->assertSee('Femelle');
});

it('assert animal status exist on page', function () {
    Animal::factory()->create(['status' => 'adopted']);
    Livewire::test('pages::animal.index')
        ->assertSee('adopted');
});

it('assert animal vaccine exist on page', function () {
    Animal::factory()->create(['vaccine' => true, 'status' => 'adopted']);
    Animal::factory()->create(['vaccine' => false, 'status' => 'adopted']);
    Livewire::test('pages::animal.index')
        ->assertSee('À jour')->assertSee('À faire');
});

it('assert animal age exist on page', function () {
    Animal::factory()->create(['age' => '2025-03-24 00:00:00', 'status' => 'adopted']);
    Animal::factory()->create(['age' => '2023-03-24 00:00:00', 'status' => 'adopted']);
    Livewire::test('pages::animal.index')
        ->assertSee('24/03/2025')->assertSee('24/03/2023');
});

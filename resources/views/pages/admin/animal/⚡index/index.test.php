<?php

use App\Models\Animal;
use Livewire\Livewire;

it('renders successfully animals admin', function () {
Livewire::test('pages::admin/animal.index')->assertStatus(200);
});

$viewedStatuses = ['adopted', 'waiting', 'available', 'in_care'];

foreach ($viewedStatuses as $status) {

it("shows name for status {$status}", function () use ($status) {
Animal::factory()->create(['name' => 'Bob', 'status' => $status]);

Livewire::test('pages::admin/animal.index')
->assertSee('Bob');
});

it("shows race for status {$status}", function () use ($status) {
Animal::factory()->create(['race' => 'Berger Allemand', 'status' => $status]);

Livewire::test('pages::admin/animal.index')
->assertSee('Berger Allemand');
});

it("shows description for status {$status}", function () use ($status) {
Animal::factory()->create(['description' => 'Lorem ipsum', 'status' => $status]);

Livewire::test('pages::admin/animal.index')
->assertSee('Lorem ipsum');
});

it("shows gender for status {$status}", function () use ($status) {
Animal::factory()->create(['gender' => true, 'status' => $status]);
Animal::factory()->create(['gender' => false, 'status' => $status]);

Livewire::test('pages::admin/animal.index')
->assertSee('Mâle')
->assertSee('Femelle');
});

it("shows vaccine for status {$status}", function () use ($status) {
Animal::factory()->create(['vaccine' => true, 'status' => $status]);

Livewire::test('pages::admin/animal.index')
->assertSee('À jour');
});

it("shows age for status {$status}", function () use ($status) {
Animal::factory()->create(['age' => '2025-03-24 00:00:00', 'status' => $status]);

Livewire::test('pages::admin/animal.index')
->assertSee('24/03/2025');
});

it("shows specie for status {$status}", function () use ($status) {
Animal::factory()->create(['specie' => 'dog', 'status' => $status]);

Livewire::test('pages::admin/animal.index')
->assertSee('dog');
});
}

<?php

use App\Models\Animal;
use App\Models\Specie;
use Livewire\Livewire;
use function Pest\Laravel\get;

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

        $breed = \App\Models\Breed::factory()->create([
            'name' => 'Berger Allemand',
        ]);

        Animal::factory()->create([
            'breed_id' => $breed->id,
            'status' => $status,
        ]);

        Livewire::test('pages::admin/animal.index')
            ->assertSee('Berger Allemand');
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

        $specie = \App\Models\Specie::factory()->create([
            'name' => 'Chien',
        ]);

        Animal::factory()->create([
            'specie_id' => $specie->id,
            'status' => $status,
        ]);

        Livewire::test('pages::admin/animal.index')
            ->assertSee('Chien');
    });
}

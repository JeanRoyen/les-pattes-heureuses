<?php

use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::admin/volunteer.index')
        ->assertStatus(200);
});

it('shows volunteers name on page', function () {
    User::factory()->create(['name' => 'Chloé']);

    Livewire::test('pages::admin/volunteer.index')
        ->assertSee('Chloé');
});

it('shows volunteers email on page', function () {
    User::factory()->create(['email' => 'chloe@benevole.be']);

    Livewire::test('pages::admin/volunteer.index')
        ->assertSee('chloe@benevole.be');
});

it('shows volunteers phone number on page', function () {
    User::factory()->create(['phone' => '0471420854']);

    Livewire::test('pages::admin/volunteer.index')
        ->assertSee('0471420854');
});

it('shows volunteers role on page', function () {
    User::factory()->create(['role' => true]);
    User::factory()->create(['role' => false]);

    Livewire::test('pages::admin/volunteer.index')
        ->assertSee('Administrateur')
        ->assertSee('Bénévole');
});

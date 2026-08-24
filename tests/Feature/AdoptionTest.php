<?php

use App\Models\Adoption;
use App\Models\Animal;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;

it('loads all animals for the adoption list with one query', function () {
    $animal = Animal::factory()->create();

    Adoption::factory()->count(8)->create([
        'animal_id' => $animal->id,
    ]);

    $animalQueries = [];

    DB::listen(function ($query) use (&$animalQueries) {
        if (str_contains($query->sql, 'from "animals"')) {
            $animalQueries[] = $query->sql;
        }
    });

    Livewire::test('pages::admin/adoption.index')
        ->assertSee($animal->name);

    expect($animalQueries)->toHaveCount(1);
});

it('eager loads the animal when opening an adoption', function () {
    $animal = Animal::factory()->create();
    $adoption = Adoption::factory()->create([
        'animal_id' => $animal->id,
    ]);

    Livewire::test('pages::admin/adoption.show')
        ->dispatch('open', id: $adoption->id)
        ->assertSet('isOpen', true)
        ->assertSee($animal->name);
});

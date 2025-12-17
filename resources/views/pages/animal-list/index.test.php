<?php

use App\Models\Animal;
use Livewire\Livewire;
use function Pest\Laravel\get;

it('displays animals page correctly', function () {
    get(route('pages.animals-list'))
        ->assertStatus(200)
        ->assertViewIs('pages.animal-list.index');
});

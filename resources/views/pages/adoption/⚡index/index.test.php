<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::adoption.index')
        ->assertStatus(200);
});

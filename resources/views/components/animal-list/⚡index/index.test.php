<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('animal-list.index')
        ->assertStatus(200);
});

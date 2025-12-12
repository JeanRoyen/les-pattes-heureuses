<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('volunteer.index')
        ->assertStatus(200);
});

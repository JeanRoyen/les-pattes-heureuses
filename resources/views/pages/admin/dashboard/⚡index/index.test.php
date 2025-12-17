<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('dashboard.index')
        ->assertStatus(200);
});

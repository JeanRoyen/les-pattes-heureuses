<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::admin/dashboard.index')
        ->assertStatus(200);
});

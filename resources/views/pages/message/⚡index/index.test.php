<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::message.index')
        ->assertStatus(200);
});

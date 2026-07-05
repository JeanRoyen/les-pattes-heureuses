<?php

use App\Models\Message;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::admin/message.index')
        ->assertStatus(200);
});

$viewedStatuses = [0, 1];

foreach ($viewedStatuses as $status) {

    it("shows object for status {$status}", function () use ($status) {
        Message::factory()->create(['title' => 'Salut je suis Sarah ', 'received' => $status]);

        Livewire::test('pages::admin/message.index')
            ->assertSee('Salut je suis Sarah');
    });

    it("shows email for status {$status}", function () use ($status) {
        Message::factory()->create(['email' => 'Sarah@adopte.be', 'received' => $status]);

        Livewire::test('pages::admin/message.index')
            ->assertSee('Sarah@adopte.be');
    });

    it("shows phone number for status {$status}", function () use ($status) {
        Message::factory()->create(['phone' => '0471420854', 'received' => $status]);

        Livewire::test('pages::admin/message.index')
            ->assertSee('0471420854');
    });
}

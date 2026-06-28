<?php

use App\Models\Message;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Messages | Les Pattes Heureuses')]
class extends Component {
    public bool $isOpen = false;
    public ?Message $message = null;


    #[On('close')]
    public function close()
    {
        $this->isOpen = false;
        $this->message = null;
    }

    #[On('open')]
    public function open(int $id)
    {
        $this->isOpen = true;
        $this->message = Message::findOrFail($id);
    }
};
?>

<x-modal.modal wire:show="isOpen">
    <x-slot:title>
        <p>Message de {{ $message?->name }}</p>
    </x-slot:title>
    <x-slot:body>
        <div class="space-y-3 text-md text-text">
            <div class="grid grid-cols-3 gap-2">
                <p>Email</p>
                <a class="text-blue-500 underline" href="mailto:{{ $message?->email }}">{{ $message?->email }}</a>
            </div>

            <div class="grid grid-cols-3 gap-2">
                <p>Téléphone</p>
                <p class="col-p-2">{{ $message?->phone }}</p>
            </div>

            <div class="grid grid-cols-3 gap-2">
                <p>Objet</p>
                <p class="col-p-2">{{ $message?->title }}</p>
            </div>

            <div class="pt-2 border-t">
                <p class="font-medium mb-1">Message</p>
                <p class="">
                    {{ $message?->message }}
                </p>
            </div>

            <div class="pt-4 flex justify-end">
                <x-form.button wire:click="close" title="Marquer comme lu" />
            </div>
        </div>
    </x-slot:body>
</x-modal.modal>

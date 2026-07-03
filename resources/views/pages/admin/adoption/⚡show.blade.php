<?php

use App\Models\Adoption;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Messages | Les Pattes Heureuses')]
class extends Component {
    public bool $isOpen = false;
    public Adoption $adoption;


    #[On('close')]
    public function close()
    {
        $this->isOpen = false;
    }

    #[On('open')]
    public function open(int $id)
    {
        $this->isOpen = true;
        $this->adoption = Adoption::findOrFail($id);
    }

    public function accept(): void
    {
        $this->adoption->update([
            'status' => 'accepted'
        ]);

        $this->dispatch('adoption-updated');
        $this->close();
    }


    public function reject(): void
    {
        $this->adoption->update([
            'status' => 'refused',
        ]);

        $this->dispatch('adoption-updated');
        $this->close();
    }
};
?>

<x-modal.modal wire:show="isOpen" wire:key="{{ $adoption?->id }}" wire:keydown.escape="close()">
    <x-slot:title>
        <p>Demande d'adoption de {{ $adoption?->name }}</p>
        <button class="cursor-pointer" type="button" wire:click="close()">
            <img src="{{ asset('svg/close.svg') }}" alt="close" height="30" width="30">
        </button>
    </x-slot:title>

    <x-slot:body>
        <div class="space-y-3 text-md text-text">
            <div class="grid grid-cols-3 gap-2">
                <p>Email</p>
                <x-general.link href="mailto:{{ $adoption?->email }}" title="{{ $adoption?->email }}" />
            </div>

            <div class="grid grid-cols-3 gap-2">
                <p>Téléphone</p>
                <x-general.link href="tel:{{ $adoption?->phone }}" title="{{ $adoption?->phone }}" />
            </div>

            <div class="grid grid-cols-3 gap-2">
                <p>Nom de l'animal</p>
                <p class="col-p-2 font-bold">{{ $adoption?->animal->name }}</p>
            </div>

            <div class="grid grid-cols-3 gap-2">
                <p>État de l'adoption</p>
                <p class="col-p-2 font-bold">{{ __('adoptions.' . $adoption?->status) }}</p>
            </div>

            <div class="pt-2 border-t">
                <p class="font-medium mb-1">Message</p>
                <p>
                    {{ $adoption?->message }}
                </p>
            </div>

            <div class="pt-4 flex justify-end gap-4">
                <button
                    wire:click="reject"
                    class="bg-red-600 hover:bg-red-700 text-white py-2 w-full font-bold rounded-button">
                    Refuser
                </button>

                <button
                    wire:click="accept"
                    class="bg-green-600 hover:bg-green-700 text-white py-2 w-full font-bold rounded-button">
                    Accepter
                </button>
            </div>
        </div>
    </x-slot:body>
</x-modal.modal>

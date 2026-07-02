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
};
?>

<x-modal.modal wire:show="isOpen" wire:key="{{ $adoption?->id }}">
    <x-slot:title>
        <p>Demande d'adoption de {{ $adoption?->name }}</p>
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

            <div class="pt-2 border-t">
                <p class="font-medium mb-1">Message</p>
                <p class="">
                    {{ $adoption?->message }}
                </p>
            </div>

            <div class="pt-4 flex justify-end gap-4">
                <a class="bg-background-green hover:bg-background-green-hover text-white py-2 w-full font-bold rounded-button text-center"
                   href="mailto:{{ $adoption?->email }}">Envoyer un mail</a>
                <x-form.button wire:click="close" title="Fermer"/>
            </div>
        </div>
    </x-slot:body>
</x-modal.modal>

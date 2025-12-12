<?php

use App\Models\Animal;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {

    #[Computed]
    public function animals(): Collection
    {
        return Animal::all();
    }

    #[Computed]
    public function inCareAnimals(): Collection
    {
        return $this->animals()->where('status', 'in_care')->values();
    }

    #[Computed]
    public function waitingAnimals(): Collection
    {
        return $this->animals()->where('status', 'waiting')->values();
    }

    #[Computed]
    public function adoptedAnimals(): Collection
    {
        return $this->animals()->where('status', 'adopted')->values();
    }
};

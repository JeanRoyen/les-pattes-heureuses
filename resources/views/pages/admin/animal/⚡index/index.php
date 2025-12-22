<?php

use App\Models\Animal;
use Illuminate\Database\Eloquent\Collection;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    public bool $showCreateAnimalModal = false;
    public bool $showEditAnimalModal = false;

    public string $name = '';
    public string $specie = '';
    public string $race = '';
    public string $description = '';
    public string $status = 'waiting';
    public ?string $age = null;
    public bool $vaccine = false;
    public ?bool $gender = null;


    #[Computed]
    public function animals(): Collection
    {
        return Animal::all();
    }

    #[Computed]
    public function availableAnimals(): Collection
    {
        return $this->animals()->whereIn('status', ['in_care', 'available'])->values();
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

    public function createAnimal(): void
    {
        $this->toggleModal('createAnimal', 'open');
    }

    public function toggleModal($modalType, $action): void
    {
        if ($modalType === 'createAnimal') {
            $this->showCreateAnimalModal = $action === 'open';
            $action === 'open' ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
        } elseif ($modalType === 'openEditModal') {
            $this->showEditAnimalModal = $action === 'open';
            $action === 'open' ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
        }
    }


    public function createAnimalInList(): void
    {

        $this->validate([
            'name' => 'required',
            'specie' => 'required',
            'race' => 'required',
            'status' => 'required',
            'age' => 'required|date|before_or_equal:today',
            'gender' => 'required',
            'vaccine' => 'boolean',
            'description' => 'string',
        ]);

        $animal = Animal::create([
            'name' => $this->name,
            'specie' => $this->specie,
            'race' => $this->race,
            'status' => $this->status,
            'age' => $this->age,
            'gender' => (bool) $this->gender,
            'vaccine' => $this->vaccine,
            'description' => $this->description,
        ]);
        $this->description = $animal->description;
        $this->showCreateAnimalModal = false;

        $this->reset([
            'name',
            'specie',
            'race',
            'status',
            'age',
            'gender',
            'vaccine',
            'description',
        ]);
    }
};

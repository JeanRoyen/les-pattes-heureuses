<?php

namespace App\Livewire\Forms;

use App\Models\Animal;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use function dd;
use function optional;
use function uniqid;

class AnimalForm extends Form
{
    use WithFileUploads;

    public Animal $animal;

    #[Validate('nullable|max:10240')]
    public $avatar;

    #[Validate('required')]
    public ?int $specie_id = null;

    #[Validate('required')]
    public ?int $breed_id = null;

    #[Validate('required')]
    public $name = '';

    #[Validate('required|date|before_or_equal:today')]
    public $age;

    #[Validate('required')]
    public $gender;

    #[Validate('boolean')]
    public bool $vaccine = false;

    #[Validate('string|nullable')]
    public $description = '';

    #[Validate('string|required')]
    public $status = 'waiting';

    public function setAnimal(Animal $animal): void
    {
        $this->animal = $animal;

        $this->name = $animal->name;
        $this->specie_id = $animal->specie_id;
        $this->breed_id = $animal->breed_id;
        $this->status = $animal->status;
        $this->age = $animal->age?->format('Y-m-d');
        $this->gender = $animal->gender;
        $this->vaccine = $animal->vaccine;
        $this->description = $animal->description;
    }

    public function store(): void
    {
        $validated = $this->validate();

        unset($validated['avatar']);

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar');
        }

        Animal::create($validated);
    }

    public function update(): void
    {
        $validated = $this->validate();

        unset($validated['avatar']);

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar');
        }

        $this->animal->update($validated);
    }

}

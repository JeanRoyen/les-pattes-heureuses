<?php

use App\Jobs\ProcessAvatar;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

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

    public ?int $animalId = null;

    public array $avatar_path = [];
    public $avatar;



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
            'avatar' => 'required|image',
            'name' => 'required',
            'specie' => 'required',
            'race' => 'required',
            'status' => 'required',
            'age' => 'required|date|before_or_equal:today',
            'gender' => 'required',
            'vaccine' => 'boolean',
            'description' => 'string',
        ]);

        $avatar = null;
        if ($this->avatar) {
            $image_type = 'jpeg';
            $original_path = 'avatar/original';
            $file_name = 'avatar_img_'.uniqid().'.'.$image_type;
            $avatar_path = $this->avatar->storeAs($original_path, $file_name, 'public');
            ProcessAvatar::dispatch($file_name, $avatar_path);
            $avatar = $avatar_path;
        }

        $animal = Animal::create([
            'avatar' => $avatar,
            'name' => $this->name,
            'specie' => $this->specie,
            'race' => $this->race,
            'status' => $this->status,
            'age' => $this->age,
            'gender' => (bool) $this->gender,
            'vaccine' => $this->vaccine,
            'description' => $this->description,
        ]);

        foreach ($this->avatar as $file) {
            $path = $file->store('avatar', 'public');
            $animal->avatars()->create([
                'path' => $path,
                'description' => null
            ]);
        }

        $this->description = $animal->description;
        $this->showCreateAnimalModal = false;

        $this->reset([
            'avatar',
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

    public function openEditModal($animalId): void
    {
        $animal = Animal::findOrFail($animalId);
        $this->animalId = $animal->id;
        $this->name = $animal->name;
        $this->specie = $animal->specie;
        $this->race = $animal->race;
        $this->status = $animal->status;
        $this->age = $animal->age;
        $this->gender = $animal->gender;
        $this->vaccine = $animal->vaccine;
        $this->description = $animal->description;

        $this->toggleModal('openEditModal', 'open');
    }

    public function editAnimal(): void
    {
        $validated = $this->validate([
            'avatar' => 'required',
            'name' => 'required',
            'specie' => 'required',
            'race' => 'required',
            'status' => 'required',
            'age' => 'required|date|before_or_equal:today',
            'gender' => 'required',
            'vaccine' => 'boolean',
            'description' => 'string',
        ]);

        $animal = Animal::findOrFail($this->animalId);

        $animal->update($validated);
        $this->showEditAnimalModal = false;
        $this->reset([
            'name',
            'specie',
            'race',
            'status',
            'age',
            'gender',
            'vaccine',
            'description',
            'animalId'
        ]);

        if ($this->avatar) {
            $file_name = 'avatar_img_'.uniqid().'jpeg';
            $avatar_path = $this->avatar->storeAs('avatar/original', $file_name, 'public');
            ProcessAvatar::dispatch($file_name, $avatar_path);
            $validated['avatar'] = $avatar_path;

        }
    }
};

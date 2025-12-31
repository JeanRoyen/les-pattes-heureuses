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
    public string $status = '';
    public string $race = '';
    public string $description = '';
    public ?string $age = null;
    public bool $vaccine = false;
    public ?bool $gender = null;

    public ?int $animalId = null;

    public array $avatar_path = [];
    public $avatar;


// Available
    public string $availableSearch = '';
    public string $availableSpecie = '';
    public string $availableRace = '';
    public string $availableGender = '';
    public string $availableAgeRange = '';

// Waiting
    public string $waitingSearch = '';
    public string $waitingSpecie = '';
    public string $waitingRace = '';
    public string $waitingGender = '';
    public string $waitingAgeRange = '';

// Adopted
    public string $adoptedSearch = '';
    public string $adoptedSpecie = '';
    public string $adoptedRace = '';
    public string $adoptedGender = '';
    public string $adoptedAgeRange = '';



    #[Computed]
    public function species(): \Illuminate\Support\Collection
    {
        return Animal::query()
            ->whereNotNull('specie')
            ->select('specie')
            ->distinct()
            ->orderBy('specie')
            ->pluck('specie');
    }

    #[Computed]
    public function races(): \Illuminate\Support\Collection
    {
        return Animal::query()
            ->when($this->availableSpecie !== '', fn ($q) =>
            $q->where('specie', $this->availableSpecie)
            )
            ->select('race')
            ->distinct()
            ->orderBy('race')
            ->pluck('race');
    }



    #[Computed]
    public function availableAnimals(): Collection
    {
        return Animal::query()
            ->whereIn('status', ['in_care', 'available'])

            ->when($this->availableSearch !== '', fn ($q) =>
            $q->where('name', 'like', "%{$this->availableSearch}%")
            )

            ->when($this->availableSpecie !== '', fn ($q) =>
            $q->where('specie', $this->availableSpecie)
            )

            ->when($this->availableRace !== '', fn ($q) =>
            $q->where('race', $this->availableRace)
            )

            ->when($this->availableGender !== '', fn ($q) =>
            $q->where('gender', $this->availableGender)
            )

            ->when($this->availableAgeRange !== '', function ($q) {
                [$min, $max] = explode('-', $this->availableAgeRange);

                $q->whereBetween(
                    'age',
                    [now()->subYears($max), now()->subYears($min)]
                );
            })
            ->get();
    }

    public function deleteAnimal(int $animalId): void
    {
        $animal = Animal::findOrFail($animalId);

        $animal->delete();
    }

    #[Computed]
    public function waitingAnimals(): Collection
    {
        return Animal::query()
            ->where('status', 'waiting')

            ->when($this->waitingSearch !== '', fn ($q) =>
            $q->where('name', 'like', "%{$this->waitingSearch}%")
            )

            ->when($this->waitingSpecie !== '', fn ($q) =>
            $q->where('specie', $this->waitingSpecie)
            )

            ->when($this->waitingRace !== '', fn ($q) =>
            $q->where('race', $this->waitingRace)
            )

            ->when($this->waitingGender !== '', fn ($q) =>
            $q->where('gender', $this->waitingGender)
            )

            ->when($this->waitingAgeRange !== '', function ($q) {
                [$min, $max] = explode('-', $this->waitingAgeRange);

                $q->whereBetween(
                    'age',
                    [now()->subYears($max), now()->subYears($min)]
                );
            })

            ->get();
    }


    #[Computed]
    public function adoptedAnimals(): Collection
    {
        return Animal::query()
            ->where('status', 'adopted')

            ->when($this->adoptedSearch !== '', fn ($q) =>
            $q->where('name', 'like', "%{$this->adoptedSearch}%")
            )

            ->when($this->adoptedSpecie !== '', fn ($q) =>
            $q->where('specie', $this->adoptedSpecie)
            )

            ->when($this->adoptedRace !== '', fn ($q) =>
            $q->where('race', $this->adoptedRace)
            )

            ->when($this->adoptedGender !== '', fn ($q) =>
            $q->where('gender', $this->adoptedGender)
            )

            ->when($this->adoptedAgeRange !== '', function ($q) {
                [$min, $max] = explode('-', $this->adoptedAgeRange);

                $q->whereBetween(
                    'age',
                    [now()->subYears($max), now()->subYears($min)]
                );
            })

            ->get();
    }


    public function createAnimal(): void
    {
        $this->showCreateAnimalModal = true;
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
            'avatar' => 'image|nullable',
            'name' => 'required',
            'specie' => 'required',
            'race' => 'required',
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

        $status = auth()->user()->role
            ? ($this->status)
            : 'waiting';


        $animal = Animal::create([
            'avatar' => $avatar,
            'name' => $this->name,
            'status' => $status,
            'specie' => $this->specie,
            'race' => $this->race,
            'age' => $this->age,
            'gender' => (bool) $this->gender,
            'vaccine' => $this->vaccine,
            'description' => $this->description,
        ]);

        $this->description = $animal->description;
        $this->showCreateAnimalModal = false;

        $this->reset([
            'avatar',
            'name',
            'specie',
            'race',
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
            'avatar' => 'image|nullable',
            'name' => 'required',
            'status' => 'required',
            'specie' => 'required',
            'race' => 'required',
            'age' => 'required|date|before_or_equal:today',
            'gender' => 'required',
            'vaccine' => 'boolean',
            'description' => 'string',
        ]);

        $animal = Animal::findOrFail($this->animalId);

        $this->showEditAnimalModal = false;
        $this->reset([
            'name',
            'specie',
            'status',
            'race',
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
        if (auth()->user()->role && isset($validated['status'])) {
            $animal->status = $validated['status'];
        }

        $animal->update($validated);
    }
};

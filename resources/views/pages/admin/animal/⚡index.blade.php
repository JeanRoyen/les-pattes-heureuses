<?php

use App\Jobs\ProcessAvatar;
use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

new #[Title('Animaux | Les Pattes Heureuses')] class extends Component {
    use WithFileUploads;
    use WithPagination;

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
            ->when($this->availableSpecie !== '', fn($q) => $q->where('specie', $this->availableSpecie)
            )
            ->select('race')
            ->distinct()
            ->orderBy('race')
            ->pluck('race');
    }

    public function deleteAnimal(int $animalId): void
    {
        $animal = Animal::findOrFail($animalId);

        $animal->delete();
    }


    public function updatingAvailableSearch(): void
    {
        $this->resetPage();
    }


    #[Computed]
    public function availableAnimals()
    {
        return Animal::query()
            ->whereIn('status', ['in_care', 'available'])
            ->when($this->availableSearch !== '', fn($q) => $q->where('name', 'like', "%{$this->availableSearch}%")
            )
            ->when($this->availableSpecie !== '', fn($q) => $q->where('specie', $this->availableSpecie)
            )
            ->when($this->availableRace !== '', fn($q) => $q->where('race', $this->availableRace)
            )
            ->when($this->availableGender !== '', fn($q) => $q->where('gender', $this->availableGender)
            )
            ->when($this->availableAgeRange !== '', function ($q) {
                [$min, $max] = explode('-', $this->availableAgeRange);

                $q->whereBetween(
                    'age',
                    [now()->subYears($max), now()->subYears($min)]
                );
            })
            ->paginate(8);
    }

    #[Computed]
    public function waitingAnimals()
    {
        return Animal::query()
            ->where('status', 'waiting')
            ->when($this->waitingSearch !== '', fn($q) => $q->where('name', 'like', "%{$this->waitingSearch}%")
            )
            ->when($this->waitingSpecie !== '', fn($q) => $q->where('specie', $this->waitingSpecie)
            )
            ->when($this->waitingRace !== '', fn($q) => $q->where('race', $this->waitingRace)
            )
            ->when($this->waitingGender !== '', fn($q) => $q->where('gender', $this->waitingGender)
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
    public function adoptedAnimals()
    {
        return Animal::query()
            ->where('status', 'adopted')
            ->when($this->adoptedSearch !== '', fn($q) => $q->where('name', 'like', "%{$this->adoptedSearch}%")
            )
            ->when($this->adoptedSpecie !== '', fn($q) => $q->where('specie', $this->adoptedSpecie)
            )
            ->when($this->adoptedRace !== '', fn($q) => $q->where('race', $this->adoptedRace)
            )
            ->when($this->adoptedGender !== '', fn($q) => $q->where('gender', $this->adoptedGender)
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
            $file_name = 'avatar_img_' . uniqid() . '.' . $image_type;
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
            'gender' => (bool)$this->gender,
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
            $file_name = 'avatar_img_' . uniqid() . 'jpeg';
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
?>

<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Animaux au refuge"/>
        <x-general.searchbar model="availableSearch"/>
        <x-general.filters
            prefix="available"
            :species="$this->species"
            :races="$this->races"
        />
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Espèce"/>
                <x-admin.table-header title="Race"/>
                <x-admin.table-header title="Description"/>
                <x-admin.table-header title="Sexe"/>
                <x-admin.table-header title="Naissance"/>
                <x-admin.table-header title="Vaccins"/>
                <x-admin.table-header title="Status"/>
                <x-admin.table-header title="Action"/>
            </tr>
            @forelse($this->availableAnimals as $animal)
                <tr>
                    <x-admin.table-data title="{{ $animal->name }}"/>
                    <x-admin.table-data title="{{ $animal->specie }}"/>
                    <x-admin.table-data title="{{ $animal->race }}"/>
                    <x-admin.table-data title="{{ $animal->description }}"/>
                    <x-admin.table-data title="{{ $animal->gender ? 'Mâle' : 'Femelle' }}"/>
                    <x-admin.table-data title="{{ $animal->age->format('d/m/Y') }}"/>
                    <x-admin.table-data title="{{ $animal->vaccine ? 'À jour' : 'À faire' }}"/>
                    <x-admin.table-data title="{{ $animal->status }}"/>
                    <td class="border py-2 bg-white space-x-2">
                        <button
                            wire:click="openEditModal({{ $animal->id }})"
                            class="bg-background-green text-white py-1 px-3 mb-1 rounded-button">
                            Modifier
                        </button>

                        <button
                            wire:click="deleteAnimal({{ $animal->id }})"
                            wire:confirm="Êtes-vous sûr de vouloir supprimer {{ ucfirst($animal->name) }} ?"
                            class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-button">
                            Supprimer
                        </button>
                    </td>
                    {{-- TODO: Completer le formulaire de modification avec les anciennes données  --}}
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4 bg-white border">Pas d'animaux trouvés</td>
                </tr>
            @endforelse
        </x-admin.table>
        {{-- TODO: Paginate --}}
        <x-admin.cta function="createAnimal" title="Ajouter un animal"/>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Animaux en attente de validation"/>
        <x-general.searchbar model="waitingSearch"/>
        <x-general.filters
            prefix="waiting"
            :species="$this->species"
            :races="$this->races"
        />
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Espèce"/>
                <x-admin.table-header title="Race"/>
                <x-admin.table-header title="Description"/>
                <x-admin.table-header title="Sexe"/>
                <x-admin.table-header title="Naissance"/>
                <x-admin.table-header title="Vaccins"/>
                <x-admin.table-header title="Status"/>
                <x-admin.table-header title="Action"/>
            </tr>
            @forelse($this->waitingAnimals as $animal)
                <tr>
                    <x-admin.table-data title="{{ $animal->name }}"/>
                    <x-admin.table-data title="{{ $animal->specie }}"/>
                    <x-admin.table-data title="{{ $animal->race }}"/>
                    <x-admin.table-data title="{{ $animal->description }}"/>
                    <x-admin.table-data title="{{ $animal->gender ? 'Mâle' : 'Femelle' }}"/>
                    <x-admin.table-data title="{{ $animal->age->format('d/m/Y') }}"/>
                    <x-admin.table-data title="{{ $animal->vaccine ? 'À jour' : 'À faire' }}"/>
                    <x-admin.table-data title="{{ $animal->status }}"/>
                    <td class="border py-2 bg-white space-x-2">
                        <button
                            wire:click="openEditModal({{ $animal->id }})"
                            class="bg-background-green text-white py-1 px-3 mb-1 rounded-button">
                            Modifier
                        </button>
                        <button
                            wire:click="deleteAnimal({{ $animal->id }})"
                            wire:confirm="Êtes-vous sûr de vouloir supprimer {{ ucfirst($animal->name) }} ?"
                            class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-button">
                            Supprimer
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4 bg-white border">Pas d'animaux trouvés</td>
                </tr>
            @endforelse
        </x-admin.table>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Animaux adoptés"/>
        <x-general.searchbar model="adoptedSearch"/>
        <x-general.filters
            prefix="adopted"
            :species="$this->species"
            :races="$this->races"
        />
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Espèce"/>
                <x-admin.table-header title="Race"/>
                <x-admin.table-header title="Description"/>
                <x-admin.table-header title="Sexe"/>
                <x-admin.table-header title="Naissance"/>
                <x-admin.table-header title="Vaccins"/>
                <x-admin.table-header title="Status"/>
                <x-admin.table-header title="Action"/>
            </tr>
            @forelse($this->adoptedAnimals as $animal)
                <tr>
                    <x-admin.table-data title="{{ $animal->name }}"/>
                    <x-admin.table-data title="{{ $animal->specie }}"/>
                    <x-admin.table-data title="{{ $animal->race }}"/>
                    <x-admin.table-data title="{{ $animal->description }}"/>
                    <x-admin.table-data title="{{ $animal->gender ? 'Mâle' : 'Femelle' }}"/>
                    <x-admin.table-data title="{{ $animal->age->format('d/m/Y') }}"/>
                    <x-admin.table-data title="{{ $animal->vaccine ? 'À jour' : 'À faire' }}"/>
                    <x-admin.table-data title="{{ $animal->status }}"/>
                    <td class="border py-2 bg-white space-x-2">
                        <button
                            wire:click="openEditModal({{ $animal->id }})"
                            class="bg-background-green text-white py-1 px-3 mb-1 rounded-button">
                            Modifier
                        </button>
                        <button
                            wire:click="deleteAnimal({{ $animal->id }})"
                            wire:confirm="Êtes-vous sûr de vouloir supprimer {{ ucfirst($animal->name) }} ?"
                            class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-button">
                            Supprimer
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4 bg-white border">Pas d'animaux trouvés</td>
                </tr>
            @endforelse
        </x-admin.table>
        {{-- TODO: Paginate --}}
    </x-admin.section-spacing>
    <div class="{{ $showCreateAnimalModal ? 'block' : 'hidden' }}">
        <x-modal.modal>
            <x-slot:title>
                Ajouter un animal
                <button type="button" wire:click="toggleModal('createAnimal', 'close')">
                    <img src="{{ asset('svg/close.svg') }}" alt="close" height="30" width="30">
                </button>
            </x-slot:title>
            <x-slot:body>
                <x-modal.create_animal/>
            </x-slot:body>
        </x-modal.modal>
    </div>
    <div class="{{ $showEditAnimalModal ? 'block' : 'hidden' }}">
        <x-modal.modal>
            <x-slot:title>
                Modifier un animal
                <button type="button" wire:click="toggleModal('openEditModal', 'close')">
                    <img src="{{ asset('svg/close.svg') }}" alt="close" height="30" width="30">
                </button>
            </x-slot:title>
            <x-slot:body>
                <x-modal.edit_animal/>
            </x-slot:body>
        </x-modal.modal>
    </div>
</main>

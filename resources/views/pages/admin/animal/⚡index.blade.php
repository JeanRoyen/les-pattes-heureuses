<?php

use App\Models\Animal;
use App\Models\Breed;
use App\Models\Specie;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

new #[Title('Animaux | Les Pattes Heureuses')]
class extends Component {
    use WithFileUploads;
    use WithPagination;

    public bool $showCreateAnimalModal = false;
    public bool $showEditAnimalModal = false;

    public string $name = '';
    public int $specie_id = 0;
    public int $breed_id = 0;
    public string $status = '';
    public string $description = '';
    public ?string $age = null;
    public bool $vaccine = false;
    public ?bool $gender = null;

    public ?int $animalId = null;

    public array $avatar_path = [];
    public $avatar;

    // Filters & search variables
    public string $filterSearch = '';
    public string $filterSpecie = '';
    public string $filterRace = '';
    public string $filterGender = '';
    public string $filterStatus = '';

    public function updatedFilterSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function animals()
    {
        return Animal::query()
            ->with(['specie', 'breed'])
            ->when($this->filterStatus !== '', fn($q) => $q->where('status', $this->filterStatus),
                fn($q) => $q->whereIn('status', ['available', 'in_care', 'waiting', 'adopted']))
            ->when($this->filterSearch !== '', fn($q) => $q->where('name', 'like', "%$this->filterSearch%"))
            ->when($this->filterSpecie !== '', fn($q) => $q->where('specie_id', $this->filterSpecie))
            ->when($this->filterRace !== '', fn($q) => $q->where('breed_id', $this->filterRace))
            ->when($this->filterGender !== '', fn($q) => $q->where('gender', $this->filterGender))
            ->orderBy('updated_at', 'desc')
            ->paginate(8);
    }

    #[Computed]
    public function species(): Collection
    {
        return Specie::all();
    }

    #[Computed]
    public function breeds(): Collection
    {
        if ($this->filterSpecie) {
            return Breed::query()
                ->when(
                    $this->filterSpecie !== '',
                    fn($query) => $query->where('specie_id', $this->filterSpecie)
                )
                ->orderBy('name')
                ->get();
        } else {
            return Breed::all();
        }
    }

    public function deleteAnimal(int $animalId): void
    {
        $animal = Animal::findOrFail($animalId);

        $animal->delete();
    }


    public function updatedSearch($page): void
    {
        $this->resetPage();
    }


    public function createAnimal(): void
    {
        $this->showCreateAnimalModal = true;
    }

    public function showAnimal($animal)
    {
        Animal::first($animal);

        $this->redirect(route('admin.animal.show', $animal));
    }

    public function toggleModal($modalType, $action): void
    {
        if ($modalType === 'createAnimal') {
            $this->showCreateAnimalModal = $action === 'open';
            $action === 'open' ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
        }
    }

    #[On('animal-created')]
    public function refreshAfterCreate(): void
    {
        $this->showCreateAnimalModal = false;

        $this->dispatch('close-modal');
    }

    #[On('animal-updated')]
    public function refreshAfterUpdate(): void
    {
        $this->showEditAnimalModal = false;

        $this->dispatch('close-modal');
    }
};
?>

<main class="flex-1 ml-64 space-y-10">
    <x-slot:page_title>
        Animaux
    </x-slot:page_title>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Liste des animaux"/>
        <x-general.searchbar model="filterSearch"/>
        <x-general.filters
            :species="$this->species"
            :breeds="$this->breeds"
        />
        <x-admin.cta function="createAnimal" title="Ajouter un animal"/>
        <x-table>
            <x-table.animal.headers/>
            <x-table.animal.loop :animals="$this->animals"/>
        </x-table>
        {{ $this->animals->links() }}
        <div class="{{ $showCreateAnimalModal ? 'block' : 'hidden' }}">
            <x-modal.modal>
                <x-slot:title>
                    Ajouter un animal
                    <button type="button" wire:click="toggleModal('createAnimal', 'close')">
                        <img src="{{ asset('svg/close.svg') }}" alt="close" height="30" width="30">
                    </button>
                </x-slot:title>
                <x-slot:body>
                    <livewire:animal.create/>
                </x-slot:body>
            </x-modal.modal>
        </div>
    </x-admin.section-spacing>
</main>

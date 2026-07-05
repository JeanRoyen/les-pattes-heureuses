<?php

use App\Models\Animal;
use App\Models\Breed;
use App\Models\Specie;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {

    use WithPagination;

    public string $search = '';
    public string $filterStatus = '';
    public string $filterSpecie = '';
    public string $filterRace = '';
    public string $filterGender = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Computed]
    public function species(): Collection
    {
        return Specie::all();
    }

    #[Computed]
    public function breeds(): Collection
    {
        return Breed::all();
    }

    #[Computed]
    public function animals()
    {
        return Animal::whereIn('status', ['in_care', 'available'])
            ->with(['specie', 'breed'])
            ->when($this->filterStatus !== '', fn($q) => $q->where('status', $this->filterStatus),
                fn($q) => $q->whereIn('status', ['available', 'in_care', 'waiting', 'adopted']))
            ->when($this->search !== '', fn($q) => $q->where('name', 'like', "%$this->search%"))
            ->when($this->filterSpecie !== '', fn($q) => $q->where('specie_id', $this->filterSpecie))
            ->when($this->filterRace !== '', fn($q) => $q->where('breed_id', $this->filterRace))
            ->when($this->filterGender !== '', fn($q) => $q->where('gender', $this->filterGender))
            ->orderBy('created_at')
            ->paginate(8);
    }
};
?>

<section class="mt-8 md:mt-12">
    <div class="container mx-auto px-4 md:px-0 space-y-6">
        <x-general.headings2
            color="black"
            :title="__('animals.list_title')"/>
        <x-general.searchbar model="search"/>
        <x-client.filters
            :species="$this->species"
            :breeds="$this->breeds"
        />

        <div class="grid grid-cols-8 gap-5">
            @forelse($this->animals as $animal)
                <x-general.card
                    name="{{ $animal->name }}"
                    status="{{ $animal->status }}"
                    race="{{ $animal->breed->name }}"
                    species="{{ $animal->specie->name }}"
                    gender="{{ $animal->gender }}"
                    age="{{ $animal->age->format('d/m/Y') }}"
                    description="{{ $animal->description }}"
                    route="{{ route('animals.show', $animal->id) }}"
                    :picture="$animal->avatar"/>
            @empty
                <p class="col-span-full">Pas d'animaux trouvés</p>
            @endforelse
        </div>
        {{ $this->animals->links() }}
    </div>
</section>

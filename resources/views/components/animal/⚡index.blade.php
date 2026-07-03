<?php

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {

    use WithPagination;

    public string $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Computed]
    public function animals()
    {
        return Animal::whereIn('status', ['in_care', 'available'])
            ->when($this->search !== '', fn($q) => $q->where('name', 'like', "%$this->search%"))
            ->paginate(8);
    }
};
?>

<section class="mt-8 md:mt-12">
    <div class="container mx-auto px-4 md:px-0 space-y-2">
        <x-general.headings2
            color="black"
            :title="__('animals.list_title')"/>
        <x-general.searchbar model="search"/>
        {{--   <x-general.filters_animals-list
               prefix="available"
               species="chien"
               races="chat"
           />--}}

        <div class="grid grid-cols-8 gap-5">
            @forelse($this->animals as $animal)
                <x-general.card
                    name="{{ $animal->name }}"
                    status="{{ $animal->status }}"
                    race="{{ $animal->race }}"
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

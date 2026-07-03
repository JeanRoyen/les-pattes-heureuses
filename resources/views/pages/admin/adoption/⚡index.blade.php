<?php

use App\Models\Adoption;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Adoptions | Les Pattes Heureuses')]
class extends Component {

    use WithPagination;

    public string $search = '';
    public string $status = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    #[On('adoption-updated')]
    public function refreshList()
    {

    }

    #[Computed]
    public function adoptions()
    {
        return Adoption::query()
            ->when($this->search !== '', fn($q) => $q->where('name', 'like', "%$this->search%"))
            ->when($this->status !== '', fn($q) => $q->where('adoptions.status', $this->status))
            ->orderBy('created_at', 'desc')
            ->paginate(8);
    }

    public function closeModal(): void
    {
        $this->dispatch('close')->to(ref: 'modal');
    }

    public function showAdoption(int $adoption_id): void
    {
        $this->dispatch('open', id: $adoption_id);
    }
};
?>

<main class="flex-1 ml-64 space-y-10" wire:keydown.escape="closeModal">
    <x-slot:page_title>
        Adoptions
    </x-slot:page_title>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Demandes en attente"/>
        <x-general.searchbar model="search"/>
        <x-general.select name="status" title="Statut" wire:model.live="status">
            <option value="">Tous les statuts</option>
            <option value="accepted">Accepté</option>
            <option value="refused">Refusé</option>
            <option value="waiting">En attente</option>
        </x-general.select>
        <x-table>
            <tr>
                <x-table.table-header title="Nom"/>
                <x-table.table-header title="Nom de l'animal"/>
                <x-table.table-header title="Email"/>
                <x-table.table-header title="Téléphone"/>
                <x-table.table-header title="Status"/>
                <x-table.table-header title="Date de réception"/>
                <x-table.table-header title="Action"/>
            </tr>
            @foreach($this->adoptions as $adoption)
                <tr wire:key="{{ $adoption->id }}">
                    <x-table.table-data title="{{ $adoption->name }}"/>
                    <x-table.table-data title="{{ $adoption->animal->name }}"/>
                    <x-table.table-data title="{{ $adoption->email }}"/>
                    <x-table.table-data title="{{ $adoption->phone }}"/>
                    <x-table.table-data title="{{ __('adoptions.' . $adoption->status) }}"/>
                    <x-table.table-data title="{{ $adoption->created_at->format('d/m/Y') }}"/>
                    <td class="border py-2 bg-white">
                        <button
                            class="bg-blue-400  text-white py-1 px-3 mb-1 rounded-button hover:cursor-pointer hover:bg-blue-500"
                            wire:click="showAdoption({{ $adoption->id }})">Voir le message
                        </button>
                    </td>

                </tr>
            @endforeach
        </x-table>
        {{ $this->adoptions->links() }}
    </x-admin.section-spacing>
    <livewire:pages::admin.adoption.show wire:ref="modal"/>
</main>

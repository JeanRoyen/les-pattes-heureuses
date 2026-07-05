<?php

use App\Models\User;
use App\Models\VolunteerPresence;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {

    use WithPagination;

    private const days = [
        'monday', 'tuesday', 'wednesday', 'thursday',
        'friday', 'saturday', 'sunday',
    ];

    public string $scheduleSearch = '';

    public function updated()
    {
        $this->resetPage();
    }

    #[Computed]
    public function volunteers()
    {
        return User::with('volunteerPresence')
            ->when($this->scheduleSearch !== '', fn($q) => $q->where('name', 'like', "%{$this->scheduleSearch}%")
            )
            ->paginate(5);
    }

    public function togglePresence(int $userId, string $day): void
    {
        $presence = VolunteerPresence::firstOrCreate(['user_id' => $userId]);
        $presence->{$day} = !$presence->{$day};
        $presence->save();
    }
}
?>

<div class="overflow-x-auto space-y-6">
    <x-general.searchbar model="scheduleSearch" />
    <x-table>
        <tr>
            <x-table.table-header title="Bénévole"/>
            <x-table.table-header title="Lundi"/>
            <x-table.table-header title="Mardi"/>
            <x-table.table-header title="Mercredi"/>
            <x-table.table-header title="Jeudi"/>
            <x-table.table-header title="Vendredi"/>
            <x-table.table-header title="Samedi"/>
            <x-table.table-header title="Dimanche"/>
        </tr>
        @foreach($this->volunteers as $volunteer)
            <tr wire:key="{{ $volunteer->id }}">
                <x-table.table-data title="{{ $volunteer->name }}"/>
                @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                    <x-table.data-slot>
                        <input
                            type="checkbox"
                            wire:click="togglePresence({{ $volunteer->id }}, '{{ $day }}')"
                            @checked($volunteer->volunteerPresence?->{$day})
                            wire:loading.attr="disabled"
                            wire:target="togglePresence({{ $volunteer->id }}, '{{ $day }}')"
                        />
                    </x-table.data-slot>
                @endforeach
            </tr>
        @endforeach
    </x-table>
    {{ $this->volunteers->links() }}
</div>

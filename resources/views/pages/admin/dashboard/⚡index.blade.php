<?php

use App\Models\Adoption;
use App\Models\Animal;
use App\Models\Message;
use App\Models\User;
use App\Models\VolunteerPresence;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Tableau de bord | Les Pattes Heureuses')]
class extends Component {
    use WithPagination;

    public array $stats = [];
    public string $month;

    public int $receivedMessages;
    public int $receivedAdoptions;

    public string $presenceSearch = '';

    public function mount(): void
    {
        $this->loadMonthlyStats();
        $this->loadMessagesStats();
        $this->loadAdoptionsStats();
    }

    public function updated(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function presences()
    {
        return User::with('volunteerPresence')
            ->when($this->presenceSearch !== '', fn($q) => $q->where('name', 'like', "%$this->presenceSearch%"))
            ->orderBy('name')
            ->paginate(5);
    }

    private function loadMessagesStats(): void
    {
        $this->receivedMessages = Message::where('received', 1)->count();
    }

    private function loadAdoptionsStats(): void
    {
        $this->receivedAdoptions = Adoption::where('status', 'waiting')->count();
    }

    private function loadMonthlyStats(): void
    {
        $from = now()->startOfMonth();
        $to = now()->endOfMonth();

        $this->month = now()->monthName;

        $this->stats = [
            'total' => Animal::whereIn('status', ['in_care', 'available', 'waiting'])
                ->count(),

            'left' => Animal::where('status', 'adopted')
                ->whereBetween('created_at', [$from, $to])
                ->count(),

            'received' => Animal::whereBetween('created_at', [$from, $to])
                ->count(),
        ];
    }
};
?>


<main class="flex-1 ml-64 space-y-10">
    <x-slot:page_title>
        Tableau de bord
    </x-slot:page_title>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Demandes et messages"/>
        <x-admin.square-infos-container>
            <a wire:navigate href="{{ route('admin.adoptions') }}">
                <x-general.square-infos number="{{ $receivedAdoptions }}" title="Demandes" svg="contact"/>
            </a>
            <a wire:navigate href="{{ route('admin.messages') }}">
                <x-general.square-infos number="{{ $receivedMessages }}" title="Messages" svg="mail"/>
            </a>
        </x-admin.square-infos-container>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Résumé du mois de {{ $month }}"/>
        <x-admin.square-infos-container>
            <x-general.square-infos number="{{ $stats['total'] }}" title="Sont au refuge" svg="shelter"/>
            <x-general.square-infos number="{{ $stats['left'] }}" title="Ont quitté" svg="circled-minus"/>
            <x-general.square-infos number="{{ $stats['received'] }}" title="Sont arrivé refuge" svg="circled-plus"/>
        </x-admin.square-infos-container>
        <div class="mt-8">
            <div>
                <a href="{{ route('pdf') }}" class="p-3 bg-cta-orange text-white rounded-button hover: cursor-pointer">
                    Exporter en PDF
                </a>
            </div>

        </div>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Horaire des bénévoles"/>
        <x-general.searchbar model="presenceSearch"/>
        <x-table>
            <tr>
                <x-table.table-header title="Nom"/>
                <x-table.table-header title="Lundi"/>
                <x-table.table-header title="Mardi"/>
                <x-table.table-header title="Mercredi"/>
                <x-table.table-header title="Jeudi"/>
                <x-table.table-header title="Vendredi"/>
                <x-table.table-header title="Samedi"/>
                <x-table.table-header title="Dimanche"/>
            </tr>
            @foreach($this->presences as $presence)
                <tr>
                    <x-table.table-data title="{{ $presence->name }}"/>
                    <x-table.table-data title="{{ $presence->monday ? 'Présent' : 'Absent' }}"/>
                    <x-table.table-data title="{{ $presence->tuesday ? 'Présent' : 'Absent' }}"/>
                    <x-table.table-data title="{{ $presence->wednesday ? 'Présent' : 'Absent' }}"/>
                    <x-table.table-data title="{{ $presence->thursday ? 'Présent' : 'Absent' }}"/>
                    <x-table.table-data title="{{ $presence->friday ? 'Présent' : 'Absent' }}"/>
                    <x-table.table-data title="{{ $presence->saturday ? 'Présent' : 'Absent' }}"/>
                    <x-table.table-data title="{{ $presence->sunday ? 'Présent' : 'Absent' }}"/>
                </tr>
            @endforeach
        </x-table>
        {{ $this->presences->links() }}
        <a href="{{ route('admin.volunteers') }}"
           class="bg-blue-400  text-white py-3 px-3 mb-1 rounded-button hover:cursor-pointer hover:bg-blue-500">Modifier
            les horaires</a>
    </x-admin.section-spacing>
</main>

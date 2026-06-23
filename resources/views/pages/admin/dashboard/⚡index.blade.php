<?php

use App\Models\Animal;
use App\Models\Message;
use Livewire\Attributes\Layout;
use Livewire\Component;

new class extends Component {
    public array $stats = [];
    public string $month;

    public int $receivedMessages;
    public int $treatedMessages;

    public function mount(): void
    {
        $this->loadMonthlyStats();
        $this->loadMessagesStats();
    }

    private function loadMessagesStats(): void
    {
        $this->receivedMessages = Message::where('received', 0)->count();
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
    <x-admin.section-spacing>
        <x-admin.headings2 title="Demandes et messages"/>
        <x-admin.square-infos-container>
            <a wire:navigate href="{{ route('admin.adoptions') }}">
                <x-general.square-infos number="1" title="Demandes" svg="contact"/>
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
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Lundi"/>
                <x-admin.table-header title="Mardi"/>
                <x-admin.table-header title="Mercredi"/>
                <x-admin.table-header title="Jeudi"/>
                <x-admin.table-header title="Vendredi"/>
                <x-admin.table-header title="Samedi"/>
                <x-admin.table-header title="Actions"/>
            </tr>
            <tr>
                <x-admin.table-data title="Chloé"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="Modifier"/>
            </tr>
            <tr>
                <x-admin.table-data title="Chloé"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="Modifier"/>
            </tr>
            <tr>
                <x-admin.table-data title="Chloé"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="9h-12h"/>
                <x-admin.table-data title="Modifier"/>
            </tr>
        </x-admin.table>
    </x-admin.section-spacing>
</main>

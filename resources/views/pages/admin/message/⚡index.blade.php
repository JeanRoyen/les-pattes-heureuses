<?php

use App\Models\Message;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    public string $availableSearch = '';
    public string $treatedSearch = '';

    #[Computed]
    public function availableMessages()
    {
        return Message::query()
            ->where('received', 0)
            ->where(function ($q) {
                $q->where('name', 'like', "%{$this->availableSearch}%")
                    ->orWhere('title', 'like', "%{$this->availableSearch}%")
                    ->orWhere('email', 'like', "%{$this->availableSearch}%")
                    ->orWhere('phone', 'like', "%{$this->availableSearch}%");
            })
            ->get();
    }


    #[Computed]
    public function treatedMessages()
    {
        return Message::query()
            ->where('received', 1)
            ->where(function ($q) {
                $q->where('name', 'like', "%{$this->treatedSearch}%")
                    ->orWhere('title', 'like', "%{$this->treatedSearch}%")
                    ->orWhere('email', 'like', "%{$this->treatedSearch}%")
                    ->orWhere('phone', 'like', "%{$this->treatedSearch}%");
            })
            ->get();
    }
};
?>

<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Messages en attente"/>
        <x-general.searchbar model="availableSearch" placeholder="Rechercher un message..."/>
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Email"/>
                <x-admin.table-header title="Téléphone"/>
                <x-admin.table-header title="Objet"/>
                <x-admin.table-header title="Message"/>
            </tr>
            @forelse($this->availableMessages as $message)
                <tr>
                    <x-admin.table-data title="{{ $message->name }}"/>
                    <x-admin.table-data-mailto
                        title='<a href="mailto:{{ $message->email }}">{{ $message->email }}</a>'/>
                    <x-admin.table-data title="{{ $message->phone }}"/>
                    <x-admin.table-data title="{{ $message->title }}"/>
                    <x-admin.table-data title="{{ $message->message }}"/>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 bg-white border">Pas de messages trouvés</td>
                </tr>
            @endforelse
        </x-admin.table>
        {{-- TODO: Paginate --}}
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Messages traités"/>
        <x-general.searchbar model="treatedSearch" placeholder="Rechercher un message..."/>
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Email"/>
                <x-admin.table-header title="Téléphone"/>
                <x-admin.table-header title="Objet"/>
                <x-admin.table-header title="Message"/>
            </tr>
            @forelse($this->treatedMessages as $message)
                <tr>
                    <x-admin.table-data title="{{ $message->name }}"/>
                    <x-admin.table-data-mailto
                        title='<a href="mailto:{{ $message->email }}">{{ $message->email }}</a>'/>
                    <x-admin.table-data title="{{ $message->phone }}"/>
                    <x-admin.table-data title="{{ $message->title }}"/>
                    <x-admin.table-data title="{{ $message->message }}"/>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 bg-white border">Pas de messages trouvés</td>
                </tr>
            @endforelse
        </x-admin.table>
    </x-admin.section-spacing>
</main>

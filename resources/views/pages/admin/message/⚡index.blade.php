<?php

use App\Models\Message;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Messages | Les Pattes Heureuses')]
class extends Component {
    use WithPagination;

    public string $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Computed]
    public function messages()
    {
        return Message::query()
            ->where(function ($q) {
                $q->where('name', 'like', "%$this->search%")
                    ->orWhere('title', 'like', "%$this->search%")
                    ->orWhere('email', 'like', "%$this->search%")
                    ->orWhere('phone', 'like', "%$this->search%");
            })
            ->latest()
            ->paginate(8);
    }

    #[On('message-status-updated')]
    public function refreshMessages(): void
    {
        unset($this->messages);
    }

    public function markAsReadAndCloseModal(): void
    {
        $this->dispatch('close')->to(ref: 'modal');
    }

    public function showMessage(int $message_id)
    {
        $this->dispatch('open', id: $message_id);
    }
};
?>

<main class="flex-1 ml-64 space-y-10" wire:keydown.escape="markAsReadAndCloseModal">
    <x-slot:page_title>
        Messages
    </x-slot:page_title>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Messages en attente"/>
        <div>
            <input
                type="text"
                wire:model.live="search"
                placeholder="Rechercher..."
                class="bg-white text-black w-full px-4 py-2 border-gray-400 border rounded-button focus:border-background-green focus:outline-none"
            >
        </div>
        <x-table>
            <tr>
                <x-table.table-header title="Email"/>
                <x-table.table-header title="Téléphone"/>
                <x-table.table-header title="Objet"/>
                <x-table.table-header title="Status"/>
                <x-table.table-header title="Action"/>
            </tr>
            @forelse($this->messages as $message)
                <tr wire:key="{{ $message->id }}">
                    <x-table.table-data-mailto
                        title='<a href="mailto:{{ $message->email }}">{{ $message->email }}</a>'/>
                    <x-table.table-data title="{{ $message->phone }}"/>
                    <x-table.table-data title="{{ $message->title }}"/>
                    <x-table.table-data title="{{ $message->received ? 'Non lu' : 'Lu' }}"/>
                    <td class="border py-2 bg-white">
                        <button
                            class="bg-blue-400  text-white py-1 px-3 mb-1 rounded-button hover:cursor-pointer hover:bg-blue-500"
                            wire:click="showMessage({{ $message->id }})">Voir le message
                        </button>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 bg-white border">Pas de messages trouvés</td>
                </tr>
            @endforelse
        </x-table>
        {{ $this->messages->links() }}
    </x-admin.section-spacing>
    <livewire:pages::admin.message.show wire:ref="modal"/>
</main>

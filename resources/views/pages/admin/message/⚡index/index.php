<?php

use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {

    public string $availableSearch = '';
    public string $treatedSearch = '';

    #[Computed]
    public function availableMessages(): Collection
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
    public function treatedMessages(): Collection
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

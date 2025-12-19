<?php

use App\Models\Animal;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    #[Computed]
    public function messages(): Collection
    {
        return Message::all();
    }

    #[Computed]
    public function availableMessages(): Collection
    {
        return $this->messages()->where('received', 0)->values();
    }

    #[Computed]
    public function treatedMessages(): Collection
    {
        return $this->messages()->where('received', 1)->values();
    }
};

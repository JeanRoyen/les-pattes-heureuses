<?php

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function animals()
    {
        return Animal::all();
    }
};

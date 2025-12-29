<?php

use App\Models\Animal;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

new class extends Component
{
// Available
    public string $availableSearch = '';
    public string $availableSpecie = '';
    public string $availableRace = '';
    public string $availableGender = '';
    public string $availableAgeRange = '';


    public function render(): ViewView
    {
        return view('pages.⚡animals-list.animals-list')->layout('layouts.client');
    }

    #[Computed]
    public function species(): \Illuminate\Support\Collection
    {
        return Animal::query()
            ->whereNotNull('specie')
            ->select('specie')
            ->distinct()
            ->orderBy('specie')
            ->pluck('specie');
    }

    #[Computed]
    public function races(): \Illuminate\Support\Collection
    {
        return Animal::query()
            ->when($this->availableSpecie !== '', fn ($q) =>
            $q->where('specie', $this->availableSpecie)
            )
            ->select('race')
            ->distinct()
            ->orderBy('race')
            ->pluck('race');
    }

    #[Computed]
    public function availableAnimals(): Collection
    {
        return Animal::query()
            ->whereIn('status', ['in_care', 'available'])

            ->when($this->availableSearch !== '', fn ($q) =>
            $q->where('name', 'like', "%{$this->availableSearch}%")
            )

            ->when($this->availableSpecie !== '', fn ($q) =>
            $q->where('specie', $this->availableSpecie)
            )

            ->when($this->availableRace !== '', fn ($q) =>
            $q->where('race', $this->availableRace)
            )

            ->when($this->availableGender !== '', fn ($q) =>
            $q->where('gender', $this->availableGender)
            )

            ->when($this->availableAgeRange !== '', function ($q) {
                [$min, $max] = explode('-', $this->availableAgeRange);

                $q->whereBetween(
                    'age',
                    [now()->subYears($max), now()->subYears($min)]
                );
            })
            ->get();
    }

    #[Computed]
    public function dogCounter(): int
    {
        return Animal::where('specie', 'dog')->count();
    }

    #[Computed]
    public function catCounter(): int
    {
        return Animal::where('specie', 'cat')->count();
    }

    #[Computed]
    public function adoptedCounter(): int
    {
        return Animal::where('status', 'adopted')->count();
    }
};

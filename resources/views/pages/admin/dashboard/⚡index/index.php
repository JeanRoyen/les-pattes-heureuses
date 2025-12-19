<?php

use App\Models\Animal;
use Livewire\Component;

new class extends Component
{
    public array $stats = [];
    public string $month;

    public function mount(): void
    {
        $this->loadMonthlyStats();
    }

    private function loadMonthlyStats(): void
    {
        $from = now()->startOfMonth();
        $to   = now()->endOfMonth();

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

    public function render()
    {
        return view('pages.admin.dashboard.⚡index.index');
    }
};

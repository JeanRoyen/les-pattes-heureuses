<?php

use App\Models\Animal;
use App\Models\Message;
use Livewire\Component;

new class extends Component
{
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

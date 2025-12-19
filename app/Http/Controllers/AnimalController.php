<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Carbon\Carbon;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class AnimalController extends Controller
{
    public function index(): View
    {

        return view('pages.animal-list.index', [
            'animals' => Animal::whereIn('status', ['in_care', 'available', 'waiting'])->get(),
        ]);
    }
    public function download()
    {

        $from = Carbon::now()->startOfMonth()->toDateString();
        $to = Carbon::now()->endOfMonth()->toDateString();

        $viewTable = $this->getMonthlyStats();

        $pdf = Pdf::loadView('pages.pdf.pdf', $viewTable);
        return $pdf->download();
    }

    public function getMonthlyStats()
    {
        $from = now()->startOfMonth();
        $to   = now()->endOfMonth();

        return [
            'month' => now()->monthName,
            'datas' => [
                [
                    'label' => "Nombre total d'animaux au refuge",
                    'value' => Animal::whereIn('status', ['in_care', 'available', 'waiting'])
                        ->count(),
                ],
                [
                    'label' => "Nombre d'animaux adopté",
                    'value' => Animal::where('status', 'adopted')
                        ->whereBetween('created_at', [$from, $to])
                        ->count(),
                ],
                [
                    'label' => "Nombre d'animaux accueilli",
                    'value' => Animal::whereBetween('created_at', [$from, $to])
                        ->count(),
                ],
            ],
        ];
    }
}

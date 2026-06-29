<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use function now;
use function view;

class AnimalController extends Controller
{

    public function index()
    {
        return view('pages.client.animals.index', [
            'dogCount' => $this->animalCounter('1'),
            'catCount' => $this->animalCounter('2'),
            'adoptedCount' => $this->statusCounter('adopted'),
            'availableAnimals' => $this->availableAnimals(),
        ]);
    }

    public function show(Animal $animal)
    {
        return view('pages.client.animals.show', [
            'animal' => $animal,
            'animals' => $this->latestAvailableAnimals(),
        ]);
    }

    public function availableAnimals(): Collection
    {
        return Animal::whereIn('status', ['in_care', 'available'])
            ->get();
    }

    public function latestAvailableAnimals()
    {
        return Animal::whereIn('status', ['in_care', 'available'])
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
    }

    public function animalCounter(string $specie): int
    {
        return Animal::
        with('species')
            ->where('animals.specie_id', $specie)->count();
    }

    public function statusCounter(string $status): int
    {
        return Animal::where('status', $status)->count();
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
        $to = now()->endOfMonth();

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

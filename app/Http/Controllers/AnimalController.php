<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\View\View;

class AnimalController extends Controller
{
    public function index(): View
    {
        return view('pages.animal-list.index', [
            'animals' => Animal::whereIn('status', ['in_care', 'available', 'waiting'])->get(),
        ]);
    }

}

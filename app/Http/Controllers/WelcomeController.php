<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function index(): View
    {
        return view('pages.client.welcome', [
            'animals' => Animal::whereIn('status', ['in_care', 'available', 'waiting'])
                ->latest()
                ->limit(4)
                ->get(),
        ]);
    }
}

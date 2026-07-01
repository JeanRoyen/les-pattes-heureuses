<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;
use function redirect;
use function route;

class AdoptionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);

        Adoption::create($validated);
        return redirect(route('animals'));
    }
}

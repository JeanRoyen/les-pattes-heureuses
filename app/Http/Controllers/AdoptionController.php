<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function store(Request $request)
    {
        $request['phone'] = str_replace(' ', '', $request['phone']);

        $validated = $request->validate([
            'animal_id' => ['required', 'exists:animals,id'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);

        Adoption::create($validated);
        return redirect()->back()->with('success', 'Demande envoyée !');
    }
}

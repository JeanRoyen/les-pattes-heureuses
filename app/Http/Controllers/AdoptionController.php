<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;
use function redirect;
use function route;
use function str_replace;

class AdoptionController extends Controller
{
    public function store(Request $request)
    {
        $request['phone'] = str_replace(' ', '', $request['phone']);
        
        $validated = $request->validate([
            'animal_id' => ['required', 'exists:animals,id'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);

        Adoption::create($validated);
        return redirect(route('animals'));
    }
}

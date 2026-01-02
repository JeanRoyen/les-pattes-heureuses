<?php

namespace App\Http\Controllers;

use App\Mail\NewMessageMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'title' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Mail::to('Elise@refuge.be')->send(new NewMessageMail());

        Message::create($validated);
        return back()->with('success', 'Message envoyé !');
    }
}

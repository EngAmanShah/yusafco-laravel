<?php

namespace App\Http\Controllers;

use App\Models\Message; // <-- Import the Message model
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the form data
        $validated = $request->validate([
            'contactName' => 'required|string|max:255',
            'contactEmail' => 'required|email|max:255',
            'contactSubject' => 'required|string|max:255',
            'contactMessage' => 'required|string',
        ]);

        // 2. Create the message in the database
        Message::create([
            'contactName' => $validated['contactName'],
            'email' => $validated['contactEmail'],
            'subject' => $validated['contactSubject'],
            'message' => $validated['contactMessage'],
        ]);

        // 3. Return a JSON response for the JavaScript handler
        return response()->json([
            'success' => true,
            'message' => 'شكراً لك! تم إرسال رسالتك بنجاح.'
        ]);
    }
}
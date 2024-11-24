<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    // Show the form to create an event
    public function create()
    {
        return view('events.create');  // Return the view for creating an event
    }

    // Store the event in the database
    public function store(Request $request)
    {
        // Validate and store event details
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
        ]);

        // Store the event logic here (e.g., Event::create([...]))
        
        return redirect()->route('clubowner.dashboard')->with('success', 'Event created successfully!');
    }
}

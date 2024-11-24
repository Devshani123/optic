<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use Illuminate\Support\Facades\Auth;

class ClubController extends Controller
{

    public function myClubs()
    {
        // Check if the authenticated user is a club owner (role = 2)
        if (Auth::user()->role == 2) {
            // Fetch the clubs that the authenticated user owns
            $clubs = auth()->user()->clubs; // Assuming 'clubs' relationship for club owners
            return view('clubowner.dashboard', compact('clubs')); // Club owner dashboard view
        } else {
            // Fetch the clubs that the authenticated user has joined (role = 1)
            $clubs = auth()->user()->joinedClubs; // Assuming 'joinedClubs' relationship for regular users
            return view('clubs.my', compact('clubs')); // User clubs view
        }
    }

    public function register()
    {
        // Return the view to register a club
        return view('clubs.register');
    }

    // You may want to add a method for storing the new club
    public function store(Request $request)
    {
        // Validate and store club data
        $validatedData = $request->validate([
            'clubName' => 'required|string|min:3|max:50',
            'clubDescription' => 'required|string|min:10|max:500',
            'clubSize' => 'required|in:small,medium,large',
            'clubType' => 'required|in:physical,non-physical',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'timetable' => 'required|array',
            'timetable.*.day' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'timetable.*.time' => 'required|regex:/^\d{2}:\d{2}\s*-\s*\d{2}:\d{2}$/',
            // Add other validation rules as needed
        ]);
        

        $club = new Club();
        $club->name = $validatedData['clubName'];
        $club->description = $validatedData['clubDescription'];
        $club->club_type = $validatedData['clubSize'];
        $club->physical_type = $validatedData['clubType'];

        
        
        if ($request->hasFile('main_image')) {
            $club->main_image = $request->file('main_image')->store('club_images', 'public');
        }


        // Save the timetable as JSON (if it's an array)
        if (isset($validatedData['timetable'])) {
            $club->monthly_practice_timetable = json_encode($validatedData['timetable']);
        }

    

        // Assuming the club owner is authenticated and logged in
         $club->user_id = auth()->id();


        $club->save();

        return redirect()->route('clubowner.dashboard')->with('success', 'Club registered successfully!');
    }

    public function discover()
    {
        // Fetch all clubs (or apply any filters as needed)
        $clubs = Club::all();

        // Pass the clubs to the 'clubs.discover' view
        return view('clubs.discover', compact('clubs'));
    }

    public function showPhysicalClubs()
    {
        $clubs = Club::physical()->get();
        return view('clubs.physical', compact('clubs'));
    }

    public function showNonPhysicalClubs()
    {
        $clubs = Club::nonPhysical()->get();
        return view('clubs.nonPhysical', compact('clubs'));
    }

    public function join($club_id)
    {
        $club = Club::findOrFail($club_id);

        // Perform join logic, e.g., adding the user to the club's members list
        // ...

        return redirect()->back()->with('success', 'You have successfully joined the club.');
    }


    
}


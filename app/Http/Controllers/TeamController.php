<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the teams with coaches.
     */
    public function index()
    {
        // Fetch all teams from the database
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new team.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created team in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required',
            'coach' => 'required',
        ]);

        // Store the new team in the database
        Team::create([
            'name' => $request->name,
            'coach' => $request->coach,
        ]);

        // Redirect back to the teams index page with a success message
        return redirect()->route('teams.index')->with('success', 'Team created successfully!');
    }

    /**
     * Show the form for editing the specified team.
     */
    public function edit(Team $team)
    {
        // Return the edit view with the team data
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified team in the database.
     */
    public function update(Request $request, Team $team)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required',
            'coach' => 'required',
        ]);

        // Update the team in the database
        $team->update([
            'name' => $request->name,
            'coach' => $request->coach,
        ]);

        // Redirect back to the teams index page with a success message
        return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
    }

    /**
     * Remove the specified team from the database.
     */
    public function destroy(Team $team)
    {
        // Delete the team from the database
        $team->delete();

        // Redirect back to the teams index page with a success message
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully!');
    }
}

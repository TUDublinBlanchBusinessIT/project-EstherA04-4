<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Show all teams
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    // Show the form to create a team
    public function create()
    {
        return view('teams.create');
    }

    // Store a new team
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'coach' => 'required',
        ]);

        Team::create([
            'name' => $request->name,
            'coach' => $request->coach,
        ]);

        return redirect()->route('teams.index')->with('success', 'Team created successfully!');
    }

    // Show the form to edit a team
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    // Update an existing team
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'coach' => 'required',
        ]);

        $team->update([
            'name' => $request->name,
            'coach' => $request->coach,<?php

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
            
                    // Return the index view and pass the teams
                    return view('teams.index', compact('teams'));
                }
            
                // Other methods like create, store, edit, update, and destroy...
            }
            
        ]);

        return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
    }

    // Delete a team
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully!');
    }
}

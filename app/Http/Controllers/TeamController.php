<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Show all teams
    public function index()
    {
        $teams = Team::all(); // Fetch all teams
        return view('teams.index', compact('teams'));
    }

    // Show the form to create a new team
    public function create()
    {
        return view('teams.create');
    }

    // Store a new team in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'coach' => 'required',
        ]);

        Team::create($request->all());

        return redirect()->route('teams.index');
    }

    // Show the form to edit a team
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    // Update a team
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'coach' => 'required',
        ]);

        $team->update($request->all());

        return redirect()->route('teams.index');
    }

    // Delete a team
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index');
    }
}

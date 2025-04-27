<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        // Fetch all teams
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'coach' => 'required',
        ]);

        // Create team
        Team::create([
            'name' => $request->name,
            'coach' => $request->coach,
        ]);

        return redirect()->route('teams.index');
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'coach' => 'required',
        ]);

        // Update team
        $team->update([
            'name' => $request->name,
            'coach' => $request->coach,
        ]);

        return redirect()->route('teams.index');
    }

    public function destroy(Team $team)
    {
        // Delete team
        $team->delete();
        return redirect()->route('teams.index');
    }
}

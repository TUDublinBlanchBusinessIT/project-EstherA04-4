<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller {
    public function index() {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function create() {
        return view('teams.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'founded_year' => 'required|integer',
        ]);

        Team::create($request->all());
        return redirect()->route('teams.index')->with('success', 'Team created.');
    }

    public function show(Team $team) {
        return view('teams.show', compact('team'));
    }

    public function edit(Team $team) {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team) {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'founded_year' => 'required|integer',
        ]);

        $team->update($request->all());
        return redirect()->route('teams.index')->with('success', 'Team updated.');
    }

    public function destroy(Team $team) {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        // Fetch all players along with their associated team
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        // Get all teams for selection in player creation
        $teams = Team::all();
        return view('players.create', compact('teams'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'team_id' => 'required|exists:teams,id', // Ensure that the team exists in the teams table
        ]);

        // Create player
        Player::create([
            'name' => $request->name,
            'age' => $request->age,
            'team_id' => $request->team_id,
        ]);

        // Redirect to index page after saving
        return redirect()->route('players.index');
    }

    public function edit(Player $player)
    {
        // Get all teams for selection in player edit
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'team_id' => 'required|exists:teams,id',
        ]);

        // Update player data
        $player->update([
            'name' => $request->name,
            'age' => $request->age,
            'team_id' => $request->team_id,
        ]);

        // Redirect to index page after updating
        return redirect()->route('players.index');
    }

    public function destroy(Player $player)
    {
        // Delete the player
        $player->delete();

        // Redirect to index page after deleting
        return redirect()->route('players.index');
    }
}

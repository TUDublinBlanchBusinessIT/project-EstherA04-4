<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // Show all players
    public function index(Request $request)
    {
        $players = Player::when($request->get('search'), function($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->get('search') . '%');
        })
        ->when($request->get('team'), function($query) use ($request) {
            return $query->where('team_id', $request->get('team'));
        })
        ->when($request->get('age'), function($query) use ($request) {
            return $query->where('age', '>=', $request->get('age'));
        })
        ->get();

        $teams = Team::all(); // Fetch all teams for the filter dropdown

        return view('players.index', compact('players', 'teams'));
    }

    // Show the form to create a new player
    public function create()
    {
        $teams = Team::all();
        return view('players.create', compact('teams'));
    }

    // Store a new player in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'team_id' => 'required|exists:teams,id',
        ]);

        Player::create($request->all());

        return redirect()->route('players.index');
    }

    // Show the form to edit a player
    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    // Update a player
    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'team_id' => 'required|exists:teams,id',
        ]);

        $player->update($request->all());

        return redirect()->route('players.index');
    }

    // Delete a player
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index');
    }
}

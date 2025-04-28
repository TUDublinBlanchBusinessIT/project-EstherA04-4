<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function index()
    {
        $bets = Bet::with(['player', 'team'])->get(); // 👈 eager load player and team
        return view('bets.index', compact('bets'));
    }

    public function create()
    {
        $teams = Team::all();
        $players = Player::all();
        return view('bets.create', compact('teams', 'players'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'player_id' => 'required|exists:players,id',
            'team_id' => 'required|exists:teams,id',
            'amount' => 'required|numeric',
            'odds' => 'required|numeric',
        ]);

        Bet::create($validated);

        return redirect()->route('bets.index');
    }

    public function show(Bet $bet)
    {
        return view('bets.show', compact('bet'));
    }

    public function edit(Bet $bet)
    {
        $teams = Team::all();
        $players = Player::all();
        return view('bets.edit', compact('bet', 'teams', 'players'));
    }

    public function update(Request $request, Bet $bet)
    {
        $validated = $request->validate([
            'player_id' => 'required|exists:players,id',
            'team_id' => 'required|exists:teams,id',
            'amount' => 'required|numeric',
            'odds' => 'required|numeric',
        ]);

        $bet->update($validated);

        return redirect()->route('bets.index');
    }

    public function destroy(Bet $bet)
    {
        $bet->delete();

        return redirect()->route('bets.index');
    }
}

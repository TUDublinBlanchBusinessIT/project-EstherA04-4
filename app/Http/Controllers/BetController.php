<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function index()
    {
        $bets = Bet::with(['team', 'player'])->get();
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
        $request->validate([
            'team_id' => 'required',
            'player_id' => 'required',
            'bet_amount' => 'required|numeric'
        ]);

        Bet::create($request->all());

        return redirect()->route('bets.index')->with('success', '✅ Bet placed successfully!');
    }

    public function edit(Bet $bet)
    {
        $teams = Team::all();
        $players = Player::all();
        return view('bets.edit', compact('bet', 'teams', 'players'));
    }

    public function update(Request $request, Bet $bet)
    {
        $request->validate([
            'team_id' => 'required',
            'player_id' => 'required',
            'bet_amount' => 'required|numeric'
        ]);

        $bet->update($request->all());

        return redirect()->route('bets.index')->with('success', '✅ Bet updated successfully!');
    }

    public function destroy(Bet $bet)
    {
        $bet->delete();
        return redirect()->route('bets.index')->with('success', '🗑️ Bet deleted successfully!');
    }
}

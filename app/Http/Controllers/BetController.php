<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class BetController extends Controller
{
    // Show the list of bets with optional filtering, sorting, and pagination
    public function index(Request $request)
    {
        $query = Bet::query();

        // Filter by outcome if provided in the request
        if ($request->has('outcome') && $request->outcome !== 'all') {
            $query->where('outcome', $request->outcome);
        }

        // Sort the results if sorting parameters are provided
        if ($request->has('sort_by')) {
            $sortField = $request->sort_by;
            $sortOrder = $request->get('sort_order', 'asc');
            $query->orderBy($sortField, $sortOrder);
        } else {
            $query->latest(); // Default sorting to latest bets
        }

        // Paginate the results, 10 bets per page
        $bets = $query->paginate(10);

        // Return the 'bets.index' view with the list of bets
        return view('bets.index', compact('bets'));
    }

    // Show the form to create a new bet
    public function create()
    {
        $teams = Team::all();  // Fetch all teams
        $players = Player::all();  // Fetch all players
        return view('bets.create', compact('teams', 'players'));  // Pass teams and players to the view
    }

    // Store the newly created bet
    public function store(Request $request)
    {
        // Validate bet input
        $validated = $request->validate([
            'player_id' => 'required|exists:players,id',
            'team_id' => 'required|exists:teams,id',
            'amount' => 'required|numeric',
            'odds' => 'required|numeric',
        ]);

        // Create the bet in the database
        Bet::create($validated);

        // Redirect to the bets index page after successful creation
        return redirect()->route('bets.index');
    }

    // Show details of a specific bet
    public function show(Bet $bet)
    {
        return view('bets.show', compact('bet'));
    }

    // Show the form to edit an existing bet
    public function edit(Bet $bet)
    {
        $teams = Team::all();
        $players = Player::all();
        return view('bets.edit', compact('bet', 'teams', 'players'));
    }

    // Update an existing bet
    public function update(Request $request, Bet $bet)
    {
        // Validate bet input
        $validated = $request->validate([
            'player_id' => 'required|exists:players,id',
            'team_id' => 'required|exists:teams,id',
            'amount' => 'required|numeric',
            'odds' => 'required|numeric',
        ]);

        // Update the bet record in the database
        $bet->update($validated);

        // Redirect to the bets index page after successful update
        return redirect()->route('bets.index');
    }

    // Delete a bet
    public function destroy(Bet $bet)
    {
        // Delete the bet from the database
        $bet->delete();

        // Redirect to the bets index page after successful deletion
        return redirect()->route('bets.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function index(Request $request)
    {
        // Start with the query for Bet
        $query = Bet::query();

        // Filtering by outcome (if provided in the request)
        if ($request->has('outcome') && $request->outcome !== 'all') {
            $query->where('outcome', $request->outcome);
        }

        // Sorting (if provided in the request)
        if ($request->has('sort_by')) {
            $sortField = $request->sort_by;
            $sortOrder = $request->get('sort_order', 'asc');
            $query->orderBy($sortField, $sortOrder);
        } else {
            $query->latest(); // Default sorting (latest bets)
        }

        // Paginate the results, showing 10 bets per page
        $bets = $query->paginate(10);

        // Return the 'bets.index' view with the bets data
        return view('bets.index', compact('bets'));
    }

    // Other controller methods (create, store, show, edit, update, destroy) can go here...
}

@extends('layouts.app')

@section('content')
    <h2 class="mb-4">➕ Place New Bet</h2>

    <form action="{{ route('bets.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Select Team ⚽</label>
            <select name="team_id" class="form-control" required>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Select Player 🧍</label>
            <select name="player_id" class="form-control" required>
                @foreach ($players as $player)
                    <option value="{{ $player->id }}">{{ $player->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Bet Amount 💰</label>
            <input type="number" step="0.01" name="bet_amount" class="form-control" placeholder="Enter amount" required>
        </div>

        <button class="btn btn-custom">Place Bet ✅</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h2 class="mb-4">✏️ Edit Bet</h2>

    <form action="{{ route('bets.update', $bet->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Select Team ⚽</label>
            <select name="team_id" class="form-control" required>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" {{ $bet->team_id == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Select Player 🧍</label>
            <select name="player_id" class="form-control" required>
                @foreach ($players as $player)
                    <option value="{{ $player->id }}" {{ $bet->player_id == $player->id ? 'selected' : '' }}>
                        {{ $player->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Bet Amount 💰</label>
            <input type="number" step="0.01" name="bet_amount" class="form-control" value="{{ $bet->bet_amount }}" required>
        </div>

        <button class="btn btn-custom">Update Bet ✅</button>
    </form>
@endsection

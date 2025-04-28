@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Bet</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('bets.update', $bet->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="player_id">Player</label>
                    <select name="player_id" class="form-control" required>
                        @foreach ($players as $player)
                            <option value="{{ $player->id }}" {{ $bet->player_id == $player->id ? 'selected' : '' }}>
                                {{ $player->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="team_id">Team</label>
                    <select name="team_id" class="form-control" required>
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}" {{ $bet->team_id == $team->id ? 'selected' : '' }}>
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" class="form-control" value="{{ $bet->amount }}" required>
                </div>

                <div class="form-group">
                    <label for="odds">Odds</label>
                    <input type="number" name="odds" class="form-control" value="{{ $bet->odds }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Bet</button>
            </form>
        </div>
    </div>
@endsection

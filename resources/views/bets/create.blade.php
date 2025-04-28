@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Create New Bet</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('bets.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="player_id">Player</label>
                    <select name="player_id" class="form-control" required>
                        @foreach ($players as $player)
                            <option value="{{ $player->id }}">{{ $player->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="team_id">Team</label>
                    <select name="team_id" class="form-control" required>
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="odds">Odds</label>
                    <input type="number" name="odds" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Create Bet</button>
            </form>
        </div>
    </div>
@endsection

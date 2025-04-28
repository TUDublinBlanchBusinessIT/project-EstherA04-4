@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Bets</h3>
            <a href="{{ route('bets.create') }}" class="btn btn-success">Create New Bet</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Team</th>
                        <th>Amount</th>
                        <th>Odds</th>
                        <th>Outcome</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bets as $bet)
                        <tr>
                            <td>{{ $bet->player ? $bet->player->name : 'Unknown Player' }}</td>
                            <td>{{ $bet->team ? $bet->team->name : 'Unknown Team' }}</td>
                            <td>{{ $bet->amount }}</td>
                            <td>{{ $bet->odds }}</td>
                            <td>{{ ucfirst($bet->outcome) }}</td>
                            <td>
                                <a href="{{ route('bets.edit', $bet->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('bets.destroy', $bet->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

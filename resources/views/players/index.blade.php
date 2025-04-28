@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Players <a href="{{ route('players.create') }}" class="btn btn-sm btn-primary float-end">Add Player</a></div>
        <div class="card-body">
            <table class="table">
                <thead><tr><th>Name</th><th>Age</th><th>Team</th><th>Actions</th></tr></thead>
                <tbody>
                @foreach($players as $player)
                    <tr>
                        <td>{{ $player->name }}</td>
                        <td>{{ $player->age }}</td>
                        <td>{{ $player->team->name }}</td>
                        <td>
                            <a href="{{ route('players.edit', $player) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('players.destroy', $player) }}" method="POST" style="display:inline-block">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this player?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

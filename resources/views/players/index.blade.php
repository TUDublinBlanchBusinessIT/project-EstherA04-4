@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Players 🧍</h2>

    <a href="{{ route('players.create') }}" class="btn btn-custom mb-3">➕ Add New Player</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>🏷️ ID</th>
                <th>🧍 Player Name</th>
                <th>⚽ Team</th>
                <th>⚙️ Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
                <tr>
                    <td>{{ $player->id }}</td>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->team->name }}</td>
                    <td>
                        <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                        <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')
    <h2 class="mb-4">➕ Add New Player</h2>

    <form action="{{ route('players.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Player Name 🧍</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Select Team ⚽</label>
            <select name="team_id" class="form-control" required>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-custom">Save ➡️</button>
    </form>
@endsection

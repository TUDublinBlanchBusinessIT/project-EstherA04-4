@extends('layouts.app')

@section('content')
    <h2 class="mb-4">✏️ Edit Player</h2>

    <form action="{{ route('players.update', $player->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Player Name 🧍</label>
            <input type="text" name="name" class="form-control" value="{{ $player->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Select Team ⚽</label>
            <select name="team_id" class="form-control" required>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" {{ $player->team_id == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-custom">Update ✅</button>
    </form>
@endsection

<!-- resources/views/players/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Player</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('players.update', $player->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $player->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{ old('age', $player->age) }}" required>
                </div>

                <div class="form-group">
                    <label for="team_id">Team</label>
                    <select name="team_id" id="team_id" class="form-control" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}" {{ $team->id == old('team_id', $player->team_id) ? 'selected' : '' }}>
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Player</button>
            </form>
        </div>
    </div>
@endsection

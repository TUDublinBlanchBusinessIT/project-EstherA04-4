@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add Player</div>
        <div class="card-body">
            <form action="{{ route('players.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Age</label>
                    <input type="number" name="age" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Team</label>
                    <select name="team_id" class="form-control" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection

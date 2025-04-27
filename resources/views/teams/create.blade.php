@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Create New Team</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('teams.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Team Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="coach" class="form-label">Coach</label>
                    <input type="text" class="form-control" id="coach" name="coach" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Team</button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h2 class="mb-4">➕ Add New Team</h2>

    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Team Name 🏷️</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-custom">Save ➡️</button>
    </form>
@endsection

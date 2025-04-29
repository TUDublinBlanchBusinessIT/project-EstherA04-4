@extends('layouts.app')

@section('content')
    <h2 class="mb-4">✏️ Edit Team</h2>

    <form action="{{ route('teams.update', $team->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Team Name 🏷️</label>
            <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
        </div>

        <button class="btn btn-custom">Update ✅</button>
    </form>
@endsection

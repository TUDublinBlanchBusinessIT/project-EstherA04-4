@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Team</h1>
    <form action="{{ route('teams.update', $team) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Team Name</label>
            <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

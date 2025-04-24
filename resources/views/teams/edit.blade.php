@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Team</div>
        <div class="card-body">
            <form action="{{ route('teams.update', $team->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $team->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="coach" class="form-label">Coach</label>
                    <input type="text" name="coach" class="form-control" id="coach" value="{{ $team->coach }}" required>
                </div>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

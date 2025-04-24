@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Team</div>
        <div class="card-body">
            <form action="{{ route('teams.update', $team->id) }}" method="POST">
                @csrf
                @method('PUT')  <!-- This is important for the PUT request -->
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $team->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="coach">Coach</label>
                    <input type="text" name="coach" id="coach" class="form-control" value="{{ $team->coach }}" required>
                </div>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

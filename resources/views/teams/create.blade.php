@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create Team</div>
        <div class="card-body">
            <form action="{{ route('teams.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="coach" class="form-label">Coach</label>
                    <input type="text" name="coach" class="form-control" id="coach" required>
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection

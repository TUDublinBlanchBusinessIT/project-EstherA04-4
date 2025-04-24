@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create Team</div>
        <div class="card-body">
            <form action="{{ route('teams.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="coach">Coach</label>
                    <input type="text" name="coach" id="coach" class="form-control" required>
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection

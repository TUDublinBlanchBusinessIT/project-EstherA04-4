@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Team</h1>
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Team Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success">Create</button>
    </form>
</div>
@endsection

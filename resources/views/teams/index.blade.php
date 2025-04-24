@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Teams</h1>
    <a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Add New Team</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>
                    <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('teams.destroy', $team) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this team?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

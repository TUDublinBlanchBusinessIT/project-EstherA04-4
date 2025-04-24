@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Teams</h3>
            <a href="{{ route('teams.create') }}" class="btn btn-success">Create New Team</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Coach</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->coach }}</td>
                            <td>
                                <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

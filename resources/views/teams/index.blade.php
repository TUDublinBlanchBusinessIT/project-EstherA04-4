@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Teams <a href="{{ route('teams.create') }}" class="btn btn-sm btn-primary float-end">Add Team</a></div>
        <div class="card-body">
            <table class="table">
                <thead><tr><th>Name</th><th>Coach</th><th>Actions</th></tr></thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->coach }}</td>
                        <td>
                            <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display:inline-block">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this team?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

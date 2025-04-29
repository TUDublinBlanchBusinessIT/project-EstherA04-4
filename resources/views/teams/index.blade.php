@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Teams ⚽</h2>

    <a href="{{ route('teams.create') }}" class="btn btn-custom mb-3">➕ Add New Team</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>🏷️ ID</th>
                <th>📛 Name</th>
                <th>⚙️ Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->name }}</td>
                    <td>
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

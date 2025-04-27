@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Players</h3>
            <a href="{{ route('players.create') }}" class="btn btn-success">Create New Player</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Team</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                        <tr>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->age }}</td>
                            <td>{{ $player->team->name }}</td>
                            <td>
                                <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </

<!-- resources/views/players/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Players</h1>
        <a href="{{ route('players.create') }}" class="btn btn-primary mb-3">Add Player</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Player Name</th>
                    <th>Team</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                <tr>
                    <td>{{ $player->id }}</td>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->team ? $player->team->name : 'No Team' }}</td>
                    <td>
                        <a href="{{ route('players.show', $player->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
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
</body>
</html>

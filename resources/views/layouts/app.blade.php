<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Football Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f6e6fa;
        }
        .navbar, .btn-primary {
            background-color: #b388eb !important;
            border-color: #b388eb !important;
        }
        .card-header, .table thead {
            background-color: #d8b4f8 !important;
            color: white;
        }
        .btn-outline-secondary {
            color: #b388eb;
            border-color: #b388eb;
        }
        .btn-outline-secondary:hover {
            background-color: #b388eb;
            color: white;
        }

        /* Apply a light grey background color to the entire row on hover */
        .table tbody tr:hover {
            background-color: #f0f0f0; /* Light grey color */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Football Manager</a>
            <div>
                <a href="{{ route('teams.index') }}" class="btn btn-outline-light me-2">Teams</a>
                <a href="{{ route('players.index') }}" class="btn btn-outline-light">Players</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

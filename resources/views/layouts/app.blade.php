<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EA Bets 🎮💸</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;900&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a2e0dc4e19.js" crossorigin="anonymous"></script>

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(135deg, #e1bee7, #ce93d8, #ba68c8);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        nav {
            background: rgba(123, 31, 162, 0.9);
            backdrop-filter: blur(5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .navbar-brand {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.8rem;
            font-weight: 900;
            color: #fff !important;
            text-shadow: 0 0 10px #fff, 0 0 20px #ce93d8;
            letter-spacing: 2px;
        }

        .nav-link {
            color: #fff !important;
            font-weight: 600;
            font-size: 1.1rem;
            margin-left: 1rem;
        }

        .nav-link:hover {
            color: #f8bbd0 !important;
            text-shadow: 0 0 6px #fff;
        }

        .container {
            animation: fadeIn 0.6s ease;
            margin-top: 2rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        footer {
            background: rgba(123, 31, 162, 0.9);
            color: white;
            padding: 15px 0;
            text-align: center;
            font-size: 0.9rem;
            box-shadow: 0 -4px 10px rgba(0,0,0,0.2);
            margin-top: auto;
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
        }

        .btn-glow {
            background-color: #ab47bc;
            color: white;
            font-weight: bold;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px #ce93d8;
        }

        .btn-glow:hover {
            background-color: #9c27b0;
            box-shadow: 0 0 15px #f3e5f5;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">EA Bets</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-end">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bets.index') }}"><i class="fas fa-money-check-alt"></i> Bets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('players.index') }}"><i class="fas fa-user-friends"></i> Players</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teams.index') }}"><i class="fas fa-flag-checkered"></i> Teams</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            EA Bets 🎮💸 | Made with 💜 by Esther Akinlade | © 2025
        </div>
    </footer>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

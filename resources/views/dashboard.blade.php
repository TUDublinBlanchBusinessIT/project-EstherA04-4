@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5" style="color: #8e24aa;">🎮 EA Bets Dashboard</h1>

    <div class="row g-4">
        <!-- Place Bet -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100" style="background-color: #f3e5f5;">
                <div class="card-body text-center">
                    <h2 class="card-title" style="color: #8e24aa;">💸 Place Bet</h2>
                    <p class="card-text">Add a new bet easily and quickly.</p>
                    <a href="{{ route('bets.create') }}" class="btn btn-custom mt-3">➕ New Bet</a>
                </div>
            </div>
        </div>

        <!-- View All Bets -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100" style="background-color: #f3e5f5;">
                <div class="card-body text-center">
                    <h2 class="card-title" style="color: #8e24aa;">📄 View Bets</h2>
                    <p class="card-text">See all bets placed by players.</p>
                    <a href="{{ route('bets.index') }}" class="btn btn-custom mt-3">📋 View Bets</a>
                </div>
            </div>
        </div>

        <!-- Manage Players -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100" style="background-color: #f3e5f5;">
                <div class="card-body text-center">
                    <h2 class="card-title" style="color: #8e24aa;">🎯 Manage Players</h2>
                    <p class="card-text">Add, edit or delete players easily.</p>
                    <a href="{{ route('players.index') }}" class="btn btn-custom mt-3">👤 Players</a>
                </div>
            </div>
        </div>

        <!-- Manage Teams -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100" style="background-color: #f3e5f5;">
                <div class="card-body text-center">
                    <h2 class="card-title" style="color: #8e24aa;">🏆 Manage Teams</h2>
                    <p class="card-text">Create or manage football teams.</p>
                    <a href="{{ route('teams.index') }}" class="btn btn-custom mt-3">🏟️ Teams</a>
                </div>
            </div>
        </div>

        <!-- Coming Soon or Stats (Optional) -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100" style="background-color: #f3e5f5;">
                <div class="card-body text-center">
                    <h2 class="card-title" style="color: #8e24aa;">📊 Bet Stats</h2>
                    <p class="card-text">Coming soon... Stay tuned! 🎉</p>
                    <button class="btn btn-secondary mt-3" disabled>🚧 Under Construction</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

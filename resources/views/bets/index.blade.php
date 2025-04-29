@extends('layouts.app')

@section('content')
    <div class="card-glass">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white"><i class="fas fa-list-ol"></i> All Bets 🎯</h2>
            <a href="{{ route('bets.create') }}" class="btn btn-glow">
                ➕ Place New Bet
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover text-white align-middle">
                <thead class="table-dark rounded">
                    <tr>
                        <th>🏷️ ID</th>
                        <th>⚽ Team</th>
                        <th>🧍 Player</th>
                        <th>💰 Bet (€)</th>
                        <th>⚙️ Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bets as $bet)
                        <tr>
                            <td>{{ $bet->id }}</td>
                            <td>{{ $bet->team->name ?? 'N/A' }}</td>
                            <td>{{ $bet->player->name ?? 'N/A' }}</td>
                            <td>€{{ number_format($bet->bet_amount, 2) }}</td>
                            <td>
                                <a href="{{ route('bets.edit', $bet->id) }}" class="btn btn-sm btn-warning me-1">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('bets.destroy', $bet->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No bets placed yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

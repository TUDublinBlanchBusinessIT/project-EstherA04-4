@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Bets</h3>
            <a href="{{ route('bets.create') }}" class="btn btn-success">➕ Create New Bet</a>
        </div>

        <div class="card-body">
            {{-- Filters --}}
            <form method="GET" action="{{ route('bets.index') }}" class="row g-3 mb-4">
                <div class="col-md-3">
                    <select name="outcome" class="form-select" onchange="this.form.submit()">
                        <option value="all" {{ request('outcome') == 'all' ? 'selected' : '' }}>🎯 All Outcomes</option>
                        <option value="win" {{ request('outcome') == 'win' ? 'selected' : '' }}>✅ Won</option>
                        <option value="lose" {{ request('outcome') == 'lose' ? 'selected' : '' }}>❌ Lost</option>
                        <option value="pending" {{ request('outcome') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="sort_by" class="form-select" onchange="this.form.submit()">
                        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>🕒 Newest</option>
                        <option value="amount" {{ request('sort_by') == 'amount' ? 'selected' : '' }}>💶 Amount</option>
                        <option value="odds" {{ request('sort_by') == 'odds' ? 'selected' : '' }}>🎲 Odds</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="sort_order" class="form-select" onchange="this.form.submit()">
                        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>🔽 Descending</option>
                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>🔼 Ascending</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('bets.index') }}" class="btn btn-outline-secondary w-100">🔄 Reset Filters</a>
                </div>
            </form>

            {{-- Bets Table --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>👤 Player</th>
                        <th>🏆 Team</th>
                        <th>💶 Amount (€)</th>
                        <th>🎲 Odds</th>
                        <th>🎯 Outcome</th>
                        <th>⚙️ Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bets as $bet)
                        <tr @if($bet->outcome == 'win') style="background-color: #d4edda;" @endif>
                            <td>{{ $bet->player->name }}</td>
                            <td>{{ $bet->team->name }}</td>
                            <td>€{{ number_format($bet->amount, 2) }}</td>
                            <td>{{ $bet->odds }}</td>
                            <td>
                                @if($bet->outcome == 'win')
                                    ✅ Won
                                @elseif($bet->outcome == 'lose')
                                    ❌ Lost
                                @else
                                    ⏳ Pending
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('bets.edit', $bet->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                <form action="{{ route('bets.destroy', $bet->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️ Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination Links --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $bets->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection

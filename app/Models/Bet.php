<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'team_id',
        'amount',
        'odds',
        'outcome',
    ];

    // Add this: a bet belongs to a player
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    // Add this: a bet belongs to a team
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

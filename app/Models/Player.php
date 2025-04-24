<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model {
    use HasFactory;

    protected $fillable = ['name', 'position', 'team_id', 'age', 'nationality'];

    public function team() {
        return $this->belongsTo(Team::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RankingUser extends Model
{
    public function tournament_name()
    {
        return $this->belongsTo(RankingTournament::class, 'tournament_id');
    }
}

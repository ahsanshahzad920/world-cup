<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function TournamentGroup()
    {
        return $this->hasMany(Tournament::class, 'tournament_id', 'id');
    }
}

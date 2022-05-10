<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMatch extends Model
{
    public function tournament_name()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }
    public function team1_name()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }
    public function team2_name()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
    public function win_name()
    {
        return $this->belongsTo(Team::class, 'win');
    }
}

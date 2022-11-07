<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantMatch extends Model
{
    public function team1_name()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }
    public function team2_name()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
    public function participant_name()
    {
        return $this->belongsTo(User::class, 'participant_id');
    }
}

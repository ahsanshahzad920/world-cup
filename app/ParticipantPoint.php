<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantPoint extends Model
{
    public function participant_name()
    {
        return $this->belongsTo(User::class, 'participant_id');
    }
    public function tournament_name()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }
}

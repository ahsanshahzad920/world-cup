<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantPoint extends Model
{
    public function participant_name()
    {
        return $this->belongsTo(User::class, 'participant_id');
    }
}

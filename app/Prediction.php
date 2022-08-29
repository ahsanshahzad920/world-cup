<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    public function tournament_name()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id', 'id');
    }
    public function match_name()
    {
        return $this->belongsTo(GroupMatch::class, 'match_id');
    }
    public function user_name()
    {
        return $this->belongsTo(User::class, 'participant_id');
    }
}

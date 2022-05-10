<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function Team1Group()
    {
        return $this->hasMany(Team::class, 'team1_id', 'id');
    }
    public function Team2Group()
    {
        return $this->hasMany(Team::class, 'team2_id', 'id');
    }
    public function TeamWin()
    {
        return $this->hasMany(Team::class, 'win', 'id');
    }
}

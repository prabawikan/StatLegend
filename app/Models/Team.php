<?php

// app/Models/Team.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';
    protected $primaryKey = 'id_team';
    protected $fillable = ['team_name', 'logo_team'];

    public function statistikTeams()
    {
        return $this->hasMany(StatistikTeam::class, 'id_team');
    }

    public function statistikPlayers()
    {
        return $this->hasMany(StatistikPlayer::class, 'id_team');
    }

    public function standings()
    {
        return $this->hasMany(Standing::class, 'id_team');
    }
}


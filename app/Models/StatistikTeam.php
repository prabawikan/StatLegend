<?php

// app/Models/StatistikTeam.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikTeam extends Model
{
    use HasFactory;

    protected $table = 'statistik_team';
    protected $primaryKey = 'id_statistik_team';
    protected $fillable = [
        'kill', 'death', 'assists', 'gold', 'damage', 'lord', 'tortoise', 'tower', 'id_team', 'id_season'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'id_team');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'id_season');
    }
}

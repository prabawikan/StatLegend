<?php 

// app/Models/Season.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $table = 'season';
    protected $primaryKey = 'id_season';

    public function statistikTeams()
    {
        return $this->hasMany(StatistikTeam::class, 'id_season');
    }

    public function statistikPlayers()
    {
        return $this->hasMany(StatistikPlayer::class, 'id_season');
    }

    public function standings()
    {
        return $this->hasMany(Standing::class, 'id_season');
    }

    public function weeklyResults()
    {
        return $this->hasMany(WeeklyResult::class, 'id_season');
    }
}

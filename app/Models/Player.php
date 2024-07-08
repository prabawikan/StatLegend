<?php 
// app/Models/Player.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'player';
    protected $primaryKey = 'id_player';

    public function statistikPlayers()
    {
        return $this->hasMany(StatistikPlayer::class, 'id_player');
    }

    public function lane()
    {
        return $this->belongsTo(Lane::class, 'id_lane');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'id_team');
    }
}

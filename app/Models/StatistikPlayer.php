<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikPlayer extends Model
{
    use HasFactory;

    protected $table = 'statistik_player'; // Menyatakan tabel yang digunakan oleh model ini

    public function player()
    {
        return $this->belongsTo(Player::class, 'id_player');
    }

    // Hubungan tidak langsung ke team melalui player
    public function team()
    {
        return $this->hasOneThrough(Team::class, Player::class, 'id_player', 'id_team', 'id_player', 'id_team');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamStatistic extends Model
{
    protected $table = 'team_statistics'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = [
        'team_name',
        'games_played',
        'wins',
        'losses',
        'points',
        // Sesuaikan dengan kolom-kolom yang ada di tabel Anda
    ];
}

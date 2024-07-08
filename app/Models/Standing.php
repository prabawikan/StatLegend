<?php

// app/Models/Standing.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    use HasFactory;

    protected $table = 'standing';
    protected $primaryKey = 'id_standing';

    public function team()
    {
        return $this->belongsTo(Team::class, 'id_team');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'id_season');
    }
}

<?php

// app/Models/Lane.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lane extends Model
{
    use HasFactory;

    protected $table = 'lane';
    protected $primaryKey = 'id_lanes';

    public function players()
    {
        return $this->hasMany(Player::class, 'id_lanes');
    }
}

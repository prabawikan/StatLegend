<?php 

// app/Models/Week.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $table = 'week';
    protected $primaryKey = 'id_week';

    public function weeklyResults()
    {
        return $this->hasMany(WeeklyResult::class, 'id_week');
    }
}

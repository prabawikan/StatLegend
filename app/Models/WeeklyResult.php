<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyResult extends Model
{
    use HasFactory;

    protected $table = 'weekly_results';

    // Jika ada kolom timestamp yang tidak digunakan, tambahkan baris ini
    public $timestamps = false;

    protected $fillable = [
        'id_standing',
        'id_week',
        'id_season',
        'match_point',
        'net_game_win'
    ];

    public function standing()
    {
        return $this->belongsTo(Standing::class, 'id_standing');
    }

    public function week()
    {
        return $this->belongsTo(Week::class, 'id_week');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'id_season');
    }
}


<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardStatisticsPlayerController extends Controller
{
    public function index()
    {
        // Query to retrieve data
        $data = DB::table('statistik_player as sp')
            ->join('player as p', 'sp.id_player', '=', 'p.id_player')
            ->join('lane as l', 'p.id_lane', '=', 'l.id_lanes')
            ->join('team as t', 'p.id_team', '=', 't.id_team')
            ->join('season as s', 'sp.id_season', '=', 's.id_season')
            ->select(
                'p.player_name',
                'l.lanes_name',
                's.season_name',
                't.short_team_name',
                'sp.total_game',
                'sp.total_kill as kills',
                'sp.total_death as deaths',
                'sp.total_assists as assists',
                DB::raw('sp.total_kill / sp.total_game as avg_kills'),
                DB::raw('sp.total_death / sp.total_game as avg_deaths'),
                DB::raw('sp.total_assists / sp.total_game as avg_assists'),
                DB::raw('(sp.total_kill + sp.total_assists) / sp.total_death as avg_kda'),
                DB::raw('sp.kill_participation * 100 as kill_participation')
            )
            ->orderBy('s.season_name')
            ->orderBy('l.lanes_name')
            ->orderBy('p.player_name')
            ->get()
            ->toArray();

        // Get unique seasons for dropdown
        $seasons = DB::table('season')->select('season_name')->distinct()->get()->pluck('season_name');

        return view('dashboardStatisticsPlayer', compact('data', 'seasons'));
    }
}

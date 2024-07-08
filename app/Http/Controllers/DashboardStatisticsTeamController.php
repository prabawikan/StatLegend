<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardStatisticsTeamController extends Controller
{
    public function index()
    {
        // Query untuk mengambil data
        $data = DB::table('statistik_team as st')
            ->join('team as t', 'st.id_team', '=', 't.id_team')
            ->join('season as s', 'st.id_season', '=', 's.id_season')
            ->select(
                't.team_name',
                's.season_name',
                'st.kill',
                'st.death',
                'st.assists',
                'st.gold',
                'st.damage',
                'st.lord',
                'st.tortoise',
                'st.tower'
            )
            ->orderBy('s.season_name')
            ->orderBy('t.team_name')
            ->get()
            ->toArray();

        // Mendapatkan season unik untuk dropdown
        $seasons = DB::table('season')->select('season_name')->distinct()->get()->pluck('season_name');

        return view('dashboardStatisticsTeam', compact('data', 'seasons'));
    }
}

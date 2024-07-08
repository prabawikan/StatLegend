<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $standings = DB::table('standing')
            ->join('team', 'standing.id_team', '=', 'team.id_team')
            ->select('team.team_name', 'team.logo_team', 'standing.match_point', 'standing.match_wl', 'standing.net_game_win', 'standing.game_wl')
            ->where('standing.id_season', 2) // Tambahkan kondisi ini
            ->orderBy('standing.match_point', 'DESC')
            ->orderBy('standing.net_game_win', 'DESC')
            ->get();

        return view('home', ['standings' => $standings]);
    }
}

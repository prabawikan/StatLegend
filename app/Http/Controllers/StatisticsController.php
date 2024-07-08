<?php

// app/Http/Controllers/StatisticsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Lane;
use App\Models\StatistikTeam;
use App\Models\StatistikPlayer;

class StatisticsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $lanes = Lane::all();
        $statistikTeams = StatistikTeam::with('team')
            ->where('id_season', 2)  // Tambahkan kondisi where untuk id_season
            ->get();
        $statistikPlayers = StatistikPlayer::with(['player.team', 'player.lane', 'team'])
            ->where('id_season', 2)  // Tambahkan kondisi where untuk id_season
            ->get();

        return view('statistics.index', compact('teams', 'lanes', 'statistikTeams', 'statistikPlayers'));
    }
}

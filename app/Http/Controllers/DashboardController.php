<?php

namespace App\Http\Controllers;

use App\Models\UserInput;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan total tim dan pemain
        $total_team = Team::count();
        $total_player = Player::count();
        $teams = Team::all();
        $players = Player::join('team', 'player.id_team', '=', 'team.id_team')
            ->join('lane', 'player.id_lane', '=', 'lane.id_lanes')
            ->get(['player.player_name', 'team.team_name', 'lane.lanes_name']);

        // Mendapatkan data jumlah input user per hari dari database
        $userInputs = DB::table('user_inputs')
                        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                        ->groupBy('date')
                        ->orderBy('date', 'asc')
                        ->get();

        // Mengubah data menjadi format yang sesuai untuk Chart.js
        $dates = [];
        $counts = [];

        $total_userInput = UserInput::count();

        foreach ($userInputs as $input) {
            $dates[] = $input->date;
            $counts[] = $input->count;
        }

        return view('dashboard', compact('total_team', 'total_player', 'teams', 'players', 'dates', 'counts', 'total_userInput'));
    }
}
   


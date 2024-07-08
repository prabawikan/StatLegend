<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardStandingController extends Controller
{
    public function index(Request $request)
    {
        $teamColors = [
            'BIGETRON ALPHA' => '#FF0000',
            'DEWA UNITED' => '#CCA559',
            'ALTER EGO' => '#000000',
            'ONIC ESPORT' => '#FFFF00',
            'RRQ HOSHI' => '#F5AA37',
            'AURA ESPORT' => '#FF4500',
            'REBELLION ESPORT' => '#164B9F',
            'EVOS GLORY' => '#83C1DA',
            'GEEK FAM' => '#000000'
        ];

        $selectedSeason = $request->query('season', 2);

        $teams = [];
        $weeklyRankings = [];

        for ($week = 1; $week <= 9; $week++) {
            $results = DB::table('weekly_results')
                ->join('standing', 'weekly_results.id_standing', '=', 'standing.id_standing')
                ->join('team', 'standing.id_team', '=', 'team.id_team')
                ->where('weekly_results.id_week', $week)
                ->where('weekly_results.id_season', $selectedSeason)
                ->orderBy('weekly_results.match_point', 'DESC')
                ->orderBy('weekly_results.net_game_win', 'DESC')
                ->select('standing.id_team', 'team.team_name', 'team.logo_team', 'weekly_results.match_point', 'weekly_results.net_game_win')
                ->get();

            $weekData = [];
            $rank = 1;

            foreach ($results as $row) {
                $teamName = $row->team_name;
                $teams[$teamName] = [
                    'logo' => asset('image/team/' . $row->logo_team),
                    'color' => $teamColors[$teamName] ?? sprintf('#%06X', mt_rand(0, 0xFFFFFF))
                ];
                $weekData[$teamName] = $rank++;
            }

            $weeklyRankings[$week] = $weekData;
        }

        $data = [];

        foreach ($teams as $teamName => $teamData) {
            $teamWeeklyData = [];

            for ($week = 1; $week <= 9; $week++) {
                $teamWeeklyData[] = $weeklyRankings[$week][$teamName] ?? null;
            }

            $data[] = [
                'label' => $teamName,
                'data' => $teamWeeklyData,
                'fill' => false,
                'borderColor' => $teamData['color'],
                'logo' => $teamData['logo']
            ];
        }

        return view('dashboardStanding', compact('data', 'selectedSeason', 'teams', 'weeklyRankings'));
    }
}

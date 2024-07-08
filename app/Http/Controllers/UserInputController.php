<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserInputController extends Controller
{
    public function index()
    {
        // Mengambil data jumlah input user per hari dari database
        $userInputs = DB::table('user_inputs')
                        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                        ->groupBy('date')
                        ->orderBy('date', 'asc')
                        ->get();

        // Mengubah data menjadi format yang sesuai untuk Chart.js
        $dates = [];
        $counts = [];

        foreach ($userInputs as $input) {
            $dates[] = $input->date;
            $counts[] = $input->count;
        }

        return view('userInput.index', ['dates' => $dates, 'counts' => $counts]);
    }
}

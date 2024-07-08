<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function fetchData(Request $request)
    {
        $value = $request->input('value');
        $data = DB::table('statistik_player')->where('team_name', $value)->first();
        return response()->json($data);
    }
}

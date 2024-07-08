<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardStandingController;
use App\Http\Controllers\DashboardStatisticsPlayerController;
use App\Http\Controllers\DashboardStatisticsTeamController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserInputController;

Route::get('/home', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ChartController;

Route::get('/userInput', [UserInputController::class, 'index']);



Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/chat', [ChatController::class, 'index']);
Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');

Route::get('/dashboardStanding', [DashboardStandingController::class, 'index'])->name('dashboardStanding');

Route::get('/dashboardStatisticsTeam', [DashboardStatisticsTeamController::class, 'index'])->name('dashboardStatisticsTeam');

Route::get('/dashboardStatisticsPlayer', [DashboardStatisticsPlayerController::class, 'index'])->name('dashboardStatisticsPlayer');

Route::get('/fetch-data', [DataController::class, 'fetchData']);



Route::get('/jadwal', function () {
    return view('jadwal');
})->name('team');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/aboutUs', function () {
    return view('aboutUs');
})->name('aboutUs');






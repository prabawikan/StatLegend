<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Statistics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <img class="navbar-brand" src="{{ asset('image/mpl-logo.png') }}" alt="MPL Logo" width="80">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('jadwal') }}">Schedule</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ url('statistics') }}">Statistics</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('chat') }}">AI Prediction</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('team') }}">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link dashboard-button" href="{{ url('/dashboard') }}">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="" >
        <div class="container">
            <h1 class="text-center" >Statistics</h1>
            <div class="tabs mb-4 d-flex justify-content-center ">
                <button class="tablink active me-5 bg-transparent text-light" onclick="openTab(event, 'Teams')">Teams</button>
                <button class="tablink bg-transparent text-light" onclick="openTab(event, 'Player')">Player</button>
            </div>
            <div id="Teams" class="tabcontent table-responsive-md">
                <table class="table">
                    <thead>
                        <tr>
                            <td>TEAMS</td>
                            <td>KILL</td>
                            <td>DEATH</td>
                            <td>ASSISTS</td>
                            <td>GOLD</td>
                            <td>DAMAGE</td>
                            <td>LORD</td>
                            <td>TORTOISE</td>
                            <td>TOWER</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statistikTeams as $statistik)
                            <tr>
                                <td class="team-name">
                                    <img src="{{ asset('image/team/' . $statistik->team->logo_team) }}" alt="Logo" class="team-logo" width="40">
                                    {{ $statistik->team->team_name }}
                                </td>
                                <td>{{ $statistik->kill }}</td>
                                <td>{{ $statistik->death }}</td>
                                <td>{{ $statistik->assists }}</td>
                                <td>{{ number_format($statistik->gold) }}</td>
                                <td>{{ number_format($statistik->damage) }}</td>
                                <td>{{ $statistik->lord }}</td>
                                <td>{{ $statistik->tortoise }}</td>
                                <td>{{ $statistik->tower }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="Player" class="tabcontent table-responsive-md" style="display: none;">
                <div class="row">
                    <div class="col-2">
                        <div class="mb-3">
                            <select id="teamFilter" class="form-select">
                                <option value="">All Team</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->team_name }}">{{ $team->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <table class="table" id="playerTable">
                    <thead>
                        <tr>
                            <td>PLAYER</td>
                            <td>TOTAL GAME</td>
                            <td>TOTAL KILLS</td>
                            <td>AVG KILLS</td>
                            <td>TOTAL DEATH</td>
                            <td>AVG DEATH</td>
                            <td>TOTAL ASSISTS</td>
                            <td>AVG ASSISTS</td>
                            <td>AVG KDA</td>
                            <td>KILL PARTICIPATION</td>
                            <td style="display: none;">TEAM</td> <!-- Hidden column for filtering -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statistikPlayers as $statistik)
                            <tr data-team="{{ $statistik->player->team->team_name }}" data-lane="{{ $statistik->player->lane->lanes_name }}">
                                <td class="player-name">
                                    <img src="{{ asset('image/team/' . $statistik->player->team->logo_team) }}" alt="Logo" class="team-logo" width="40">
                                    {{ $statistik->player->player_name }}
                                </td>
                                <td>{{ $statistik->total_game }}</td>
                                <td>{{ $statistik->total_kill }}</td>
                                <td>{{ $statistik->avg_kills }}</td>
                                <td>{{ $statistik->total_death }}</td>
                                <td>{{ $statistik->avg_death }}</td>
                                <td>{{ $statistik->total_assists }}</td>
                                <td>{{ $statistik->avg_assists }}</td>
                                <td>{{ $statistik->avg_kda }}</td>
                                <td>{{ $statistik->kill_participation *100}}%</td>
                                <td style="display: none;">{{ $statistik->player->team->team_name }}</td> <!-- Hidden column for filtering -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <footer class="m-0" >
        <div class="container">
          <ul class="d-flex">
            <li class=""><i class="fa-brands fa-facebook-f"></i></li>
            <li><i class="fa-brands fa-instagram"></i></li>
            <li><i class="fa-brands fa-youtube"></i></li>
            <li><i class="fa-brands fa-twitter"></i></li>
            <li><i class="fa-brands fa-tiktok"></i></li>
          </ul>
        </div>
      </footer>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            if (evt) {
                evt.currentTarget.className += " active";
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            var defaultTab = document.querySelector(".tablink");
            if (defaultTab) {
                defaultTab.classList.add("active");
                document.getElementById("Teams").style.display = "block";
            }
        });

        function filterPlayerTable() {
            var teamFilter = document.getElementById("teamFilter").value;
            var table = document.getElementById("playerTable");
            var tr = table.getElementsByTagName("tr");

            for (var i = 1; i < tr.length; i++) {
                var teamValue = tr[i].getAttribute("data-team");
                if (teamFilter === "" || teamValue === teamFilter) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        document.getElementById("teamFilter").addEventListener("change", filterPlayerTable);
    </script>
        <script src="https://kit.fontawesome.com/4c3afa0530.js" crossorigin="anonymous"></script>
</body>
</html>

@extends('layouts.app')

@section('content')
<div class="row header mb-4">
  <div class="col-12 p-0">
      <h4 class="text-light pb-3 pt-3">Dashboard</h4>
  </div>
</div>
<div class="main">
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="card ">
        <div class="card-body rounded-4 text-light">
          <h5 class="card-title">Total Team</h5>
          <p class="card-text">{{ $total_team }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body rounded-4 text-light">
          <h5 class="card-title">Total Player</h5>
          <p class="card-text">{{ $total_player }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body rounded-4 text-light">
          <h5 class="card-title">Total User Input AI Prediction</h5>
          <p class="card-text">{{ $total_userInput }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="">
    <h2 class="my-4">User Input AI</h2>
    <div class="row">
      <div class="col-md-8">
        <canvas id="userInputChart"></canvas>
      </div>
    </div>
  </div>

  <h2 class="mb-4">Team Data</h2>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Team Name</th>
        <th>Team Logo</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($teams as $team)
        <tr>
          <td>{{ $team->team_name }}</td>
          <td><img src="{{ asset('image/team/' . $team->logo_team) }}" alt="Logo" width="50"></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <h2 class="mb-4">Player Data</h2>
  <div class="mb-4">
    <label for="teamFilter" class="form-label">Filter by Team:</label>
    <select id="teamFilter" class="form-select">
      <option value="All">All</option>
      @foreach ($teams as $team)
        <option value="{{ $team->team_name }}">{{ $team->team_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="scrollable-table-wrapper">
    <table id="playersTable" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Player Name</th>
          <th>Team Name</th>
          <th>Lane</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($players as $player)
          <tr>
            <td>{{ $player->player_name }}</td>
            <td>{{ $player->team_name }}</td>
            <td>{{ $player->lanes_name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<script>
  document.getElementById('teamFilter').addEventListener('change', function () {
    let selectedTeam = this.value.toLowerCase();
    let table = document.getElementById('playersTable');
    let rows = table.getElementsByTagName('tr');
    for (let i = 1; i < rows.length; i++) {
      let teamName = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
      if (selectedTeam === 'all' || teamName === selectedTeam) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const ctx = document.getElementById('userInputChart').getContext('2d');

      // Mengambil data dari PHP
      const dates = @json($dates);
      const counts = @json($counts);

      const userInputData = {
          labels: dates,
          datasets: [{
              label: 'Jumlah Input User per Hari',
              data: counts,
              borderColor: 'rgba(75, 192, 192, 1)',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderWidth: 2,
              tension: 0.1
          }]
      };

      const config = {
          type: 'line',
          data: userInputData,
          options: {
              responsive: true,
              plugins: {
                  legend: {
                      display: true,
                      position: 'top'
                  },
                  tooltip: {
                      mode: 'index',
                      intersect: false
                  }
              },
              scales: {
                  x: {
                      display: true,
                      title: {
                          display: true,
                          text: 'Tanggal'
                      }
                  },
                  y: {
                      display: true,
                      title: {
                          display: true,
                          text: 'Jumlah Input'
                      },
                      beginAtZero: true
                  }
              }
          }
      };

      new Chart(ctx, config);
  });
</script>
@endsection

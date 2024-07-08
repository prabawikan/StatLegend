@extends('layouts.app')

@section('content')
<div class="row header mb-4">
  <div class="col-12 p-0">
      <h4 class="text-light pb-3 pt-3">Statistic Player</h4>
  </div>
</div>
<div class="main">
  <h2>Select Lane and Season</h2>
  <div class="row">
    <div class="col-3 d-flex">
      <select id="laneDropdown" class="form-select me-5" onchange="updateChart()">
        @php
        $lanes = array_unique(array_column($data, 'lanes_name'));
        @endphp
        @foreach ($lanes as $lane)
          <option value="{{ $lane }}">{{ $lane }}</option>
        @endforeach
      </select>

      <select id="seasonDropdown" class="form-select" onchange="updateChart()">
        @foreach ($seasons as $season)
          <option value="{{ $season }}">{{ $season }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col-8">
      <canvas id="myChart" width="400px" height="200px"></canvas>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col">
      <h2>Statistics Player</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">PLAYER</th>
            <th scope="col">LANES</th>
            <th scope="col">TOTAL GAME</th>
            <th scope="col">TOTAL KILLS</th>
            <th scope="col">AVG KILLS</th>
            <th scope="col">TOTAL DEATH</th>
            <th scope="col">AVG DEATH</th>
            <th scope="col">TOTAL ASSISTS</th>
            <th scope="col">AVG ASSISTS</th>
            <th scope="col">AVG KDA</th>
            <th scope="col">KILL PARTICIPATION</th>
          </tr>
        </thead>
        <tbody id="statsTableBody">
          @foreach ($data as $row)
            <tr>
              <td>{{ $row->player_name }}</td>
              <td>{{ $row->lanes_name }}</td>
              <td>{{ $row->total_game }}</td>
              <td>{{ $row->kills }}</td>
              <td>{{ number_format($row->avg_kills, 2) }}</td>
              <td>{{ $row->deaths }}</td>
              <td>{{ number_format($row->avg_deaths, 2) }}</td>
              <td>{{ $row->assists }}</td>
              <td>{{ number_format($row->avg_assists, 2) }}</td>
              <td>{{ number_format($row->avg_kda, 2) }}</td>
              <td>{{ number_format($row->kill_participation, 2) }}%</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  const data = @json($data);
  let chart;

  function createChart(filteredData) {
    const ctx = document.getElementById('myChart').getContext('2d');

    const labels = filteredData.map(d => `${d.short_team_name} ${d.player_name}`);
    const kills = filteredData.map(d => d.kills);
    const assists = filteredData.map(d => d.assists);
    const deaths = filteredData.map(d => d.deaths);

    chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Kills',
            data: kills,
            backgroundColor: 'rgba(181, 0, 12,1)',
            borderColor: 'rgba(181, 0, 12,1)',
            borderWidth: 1
          },
          {
            label: 'Assists',
            data: assists,
            backgroundColor: 'rgba(0, 0, 150, 1)',
            borderColor: 'rgba(0, 0, 150, 1)',
            borderWidth: 1
          },
          {
            label: 'Deaths',
            data: deaths,
            backgroundColor: 'rgba(255, 206, 86, 1)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
          }
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }

  function updateChart() {
    const lane = document.getElementById('laneDropdown').value;
    const season = document.getElementById('seasonDropdown').value;

    const filteredData = data.filter(d => {
      return (lane === '' || d.lanes_name === lane) && (season === '' || d.season_name === season);
    });

    if (chart) {
      chart.destroy();
    }

    createChart(filteredData);
    updateTable(filteredData);
  }

  function updateTable(filteredData) {
    const tableBody = document.getElementById('statsTableBody');
    tableBody.innerHTML = '';

    filteredData.forEach(row => {
      const tr = document.createElement('tr');

      tr.innerHTML = `
        <td>${row.player_name}</td>
        <td>${row.lanes_name}</td>
        <td>${row.total_game}</td>
        <td>${row.kills}</td>
        <td>${number_format(row.avg_kills, 2)}</td>
        <td>${row.deaths}</td>
        <td>${number_format(row.avg_deaths, 2)}</td>
        <td>${row.assists}</td>
        <td>${number_format(row.avg_assists, 2)}</td>
        <td>${number_format(row.avg_kda, 2)}</td>
        <td>${number_format(row.kill_participation, 2)}%</td>
      `;

      tableBody.appendChild(tr);
    });
  }

  function number_format(number, decimals) {
    return parseFloat(number).toFixed(decimals);
  }

  document.addEventListener('DOMContentLoaded', () => {
    // Select the first option in the dropdowns as the default
    document.getElementById('laneDropdown').selectedIndex = 0;
    document.getElementById('seasonDropdown').selectedIndex = 0;

    // Update chart with default selection
    updateChart();
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"></script>
@endsection

@extends('layouts.app')

@section('content')
<div class="row header mb-4">
  <div class="col-12 p-0">
      <h4 class="text-light pb-3 pt-3">Statistic Team</h4>
  </div>
</div>
<div class="main">
  <h2>Select Season</h2>
  <div class="row">
    <div class="col-3 d-flex">
      <select id="seasonDropdown" class="form-select" onchange="updateChart()">
        @foreach ($seasons as $season)
          <option value="{{ $season }}">{{ $season }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col-8">
      <canvas id="teamChart" width="400px" height="200px"></canvas>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col">
      <h2>Team Statistics</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">TEAM NAME</th>
            <th scope="col">KILL</th>
            <th scope="col">DEATH</th>
            <th scope="col">ASSISTS</th>
            <th scope="col">GOLD</th>
            <th scope="col">DAMAGE</th>
            <th scope="col">LORD</th>
            <th scope="col">TORTOISE</th>
            <th scope="col">TOWER</th>
          </tr>
        </thead>
        <tbody id="statsTableBody">
          @foreach ($data as $row)
            <tr>
              <td>{{ $row->team_name }}</td>
              <td>{{ $row->kill }}</td>
              <td>{{ $row->death }}</td>
              <td>{{ $row->assists }}</td>
              <td>{{ $row->gold }}</td>
              <td>{{ $row->damage }}</td>
              <td>{{ $row->lord }}</td>
              <td>{{ $row->tortoise }}</td>
              <td>{{ $row->tower }}</td>
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
    const ctx = document.getElementById('teamChart').getContext('2d');

    const labels = filteredData.map(d => d.team_name);
    const kills = filteredData.map(d => d.kill);
    const deaths = filteredData.map(d => d.death);
    const assists = filteredData.map(d => d.assists);

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
    const season = document.getElementById('seasonDropdown').value;

    const filteredData = data.filter(d => {
      return season === '' || d.season_name === season;
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
        <td>${row.team_name}</td>
        <td>${row.kill}</td>
        <td>${row.death}</td>
        <td>${row.assists}</td>
        <td>${row.gold}</td>
        <td>${row.damage}</td>
        <td>${row.lord}</td>
        <td>${row.tortoise}</td>
        <td>${row.tower}</td>
      `;

      tableBody.appendChild(tr);
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    // Select the first option in the dropdowns as the default
    document.getElementById('seasonDropdown').selectedIndex = 0;

    // Update chart with default selection
    updateChart();
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"></script>
@endsection

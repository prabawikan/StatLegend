@extends('layouts.app')

@section('content')
<div class="row header mb-4">
  <div class="col-12 p-0">
      <h4 class="text-light pb-3 pt-3">Standing</h4>
  </div>
</div>
<div class="main">

  <h2>Weekly Rankings Line Chart</h2>

  <div class="row mb-4">

    <div class="col-1">
      <select id="seasonSelectChart" class="form-select" onchange="changeSeason(); showWeekTable() ">
        <option value="2" {{ $selectedSeason == 2 ? 'selected' : '' }}>Season 2</option>
        <option value="1" {{ $selectedSeason == 1 ? 'selected' : '' }}>Season 1</option>
      </select>
    </div>
  </div>

  <div class="row mb-5" >
    <div class="col-md-7">
      <canvas id="rankingChart"></canvas>
    </div>
  </div>

  <h2 class="mb-4" >Weekly Rankings</h2>

  <div class="row ">
    <div class="col-1 mb-3">
        <select id="weekSelect" class="form-select" onchange="showWeekTable()">
          @for ($week = 1; $week <= 9; $week++)
            <option value="week{{ $week }}" {{ $week == 1 ? 'selected' : '' }}>Week {{ $week }}</option>
          @endfor
        </select>
    </div>
  </div>

  @foreach (range(1, 2) as $season)
    @foreach (range(1, 9) as $week)
      @php
        $weeklyResults = \App\Models\WeeklyResult::where('id_week', $week)
          ->where('id_season', $season)
          ->with('standing.team')
          ->orderBy('match_point', 'DESC')
          ->orderBy('net_game_win', 'DESC')
          ->get();
      @endphp

      <div id="season{{ $season }}-week{{ $week }}" class="week-table" style="display: none;">
        <h1>Season {{ $season }} - Week {{ $week }} Rankings</h1>
        <table class="table table-striped">
          <thead>
            <tr><th>Rank</th><th>Team Name</th><th>Match Point</th><th>Net Game Win</th></tr>
          </thead>
          <tbody>
            @forelse ($weeklyResults as $rank => $result)
              <tr>
                <td>{{ $rank + 1 }}</td>
                <td>{{ $result->standing->team->team_name }}</td>
                <td>{{ $result->match_point }}</td>
                <td>{{ $result->net_game_win }}</td>
              </tr>
            @empty
              <tr><td colspan="4">No data available</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    @endforeach
  @endforeach

</div>

<script>
  function showWeekTable() {
    var selectedSeason = document.getElementById('seasonSelectChart').value;
    var selectedWeek = document.getElementById('weekSelect').value;

    var tables = document.getElementsByClassName('week-table');
    for (var i = 0; i < tables.length; i++) {
      tables[i].style.display = 'none';
    }

    document.getElementById('season' + selectedSeason + '-' + selectedWeek).style.display = 'block';
  }

  document.getElementById('seasonSelectChart').value = '{{ $selectedSeason }}';
  document.getElementById('weekSelect').value = 'week1';
  showWeekTable();

  const ctx = document.getElementById('rankingChart').getContext('2d');
  const datasets = {!! json_encode($data) !!};

  function loadImages(datasets, callback) {
    let images = {};
    let loadedImages = 0;
    let totalImages = datasets.length;

    datasets.forEach((dataset, index) => {
      if (dataset.logo) {
        images[dataset.label] = new Image(40, 40);
        images[dataset.label].src = dataset.logo;
        images[dataset.label].onload = function () {
          loadedImages++;
          if (loadedImages >= totalImages) {
            callback(images);
          }
        };
      }
    });
  }

  loadImages(datasets, function (images) {
    datasets.forEach(dataset => {
      dataset.pointStyle = [];
      dataset.data.forEach((_, index) => {
        dataset.pointStyle[index] = images[dataset.label];
      });
    });

    const rankingChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8', 'Week 9'],
        datasets: datasets,
      },
      options: {
        elements: {
          point: {
            pointStyle: (ctx) => {
              const dataset = ctx.dataset;
              const index = ctx.dataIndex;
              return dataset.pointStyle[index];
            },
          },
        },
        scales: {
          y: {
            reverse: true,
            ticks: {
              stepSize: 1,
              beginAtZero: true,
            },
          },
        },
        responsive: true,
        plugins: {
          legend: {
            display: false,
            position: 'top',
          },
          title: {
            display: true,
            text: 'Weekly Team Rankings',
          },
        },
      },
    });

    rankingChart.data.datasets.forEach(dataset => {
      dataset.borderWidth = 4;
    });

    rankingChart.update();
  });

  function changeSeason() {
    const season = document.getElementById('seasonSelectChart').value;
    window.location.href = `?season=${season}`;
  }
</script>

@endsection

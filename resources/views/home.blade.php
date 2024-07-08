<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        button{
            margin-left: 1rem;
        
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <img class="navbar-brand" src="{{ asset('image/mpl-logo.png') }}" alt="MPL Logo" width="80" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/jadwal') }}">Schedule</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/statistics') }}">Statistics</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('chat') }}">AI Prediction</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/team') }}">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/aboutUs') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link dashboard-button" href="{{ url('/dashboard') }}">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section" style="background-image: url('{{ asset('image/background.png') }}');  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;">
        <div class="container p-5">
            <div class="d-flex justify-content-center mb-5"  style="margin: auto;">
                <img src="{{ asset('image/mpl-logo.png') }}" style="max-width: 40%; alt="MPL Logo" />
            </div>
            <h2 class="mt-3 mb-4 fw-normal text-center">Presented By</h2>
            <div class="d-flex justify-content-center"  style="margin: auto;">
                <img src="{{ asset('image/moonton-logo.png') }}" style="max-width: 10%" alt="Moonton Logo" width="250" />
            </div>
        </div>
    </section>
    

    <section class="d-flex">
        <div class="container">
            <h1 class="text-center">STANDINGS</h1>
            <table class="table table-standing">
                <thead>
                    <tr>
                        <td scope="col">RANK</td>
                        <td scope="col">TEAMS</td>
                        <td scope="col">MATCH POINT</td>
                        <td scope="col">MATCH W-L</td>
                        <td scope="col">NET GAME WIN</td>
                        <td scope="col">GAME W-L</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($standings as $index => $standing)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="team-name">
                                <img src="{{ asset('image/team/' . $standing->logo_team) }}" alt="Logo" width="40" class="team-logo me-3">
                                {{ $standing->team_name }}
                            </td>
                            <td>{{ $standing->match_point }}</td>
                            <td>{{ $standing->match_wl }}</td>
                            <td>{{ $standing->net_game_win }}</td>
                            <td>{{ $standing->game_wl }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>*The bottom three positions do not qualify for the playoffs</p>
        </div>
    </section>

    <section class="participating-teams d-flex">
        <div class="container">
            <h1 class="participating-teams text-center">PARTICIPATING <span>TEAMS</span></h1>
            <!-- Your team cards here -->
        </div>
    </section>

    <section>
        <div class="container">
            <div class="container-card-about">
                <div class="card card-about">
                    <div class="card-about-img-container">
                        <img src="{{ asset('image/mpl-logo.png') }}" class="card-img-top" alt="Moonton Logo" />
                    </div>
                    <div class="card-body p-0">
                        <p class="card-text">Mobile Legends: Bang Bang Professional League MPLID is the premier esports league for Mobile Legends: Bang Bang in Malaysia and Singapore.</p>
                    </div>
                </div>
                <div class="card card-about">
                    <h3 class="card-title mb-0 mt-4">PARTNER</h3>
                    <div class="card-about-img-container">
                        <img src="{{ asset('image/moonton-logo.png') }}" class="card-img-top" alt="Moonton Logo" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
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

    <script src="https://kit.fontawesome.com/4c3afa0530.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

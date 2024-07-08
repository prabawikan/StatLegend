<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Teams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css" />

    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
      <div class="container">
        <img class="navbar-brand" src="image/mpl-logo.png" alt="MPL Logo" width="80" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ url('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('jadwal') }}">Schedule</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('statistics') }}">Statistics</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('chat') }}">AI Prediction</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ url('team') }}">Team</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link dashboard-button" href="{{ url('/dashboard') }}">Dashboard</a></li>
          </ul>
        </div>
      </div>
    </nav>


      <section class="hero-section d-flex mt-5 pt-5" style="background-image: url('{{ asset('image/background.png') }}');  background-size: cover;
      background-position: center;
      background-repeat: no-repeat;">
      <div class="container">
        <h1 class="text-center mb-5">TEAM</h1>
        <div class="team">
          <div class="card bg-transparent">
            <div class="card-img-container">
              <img src="image/team/ae.png" class="card-img-top" alt="ALTER EGO" />
            </div>
            <div class="card-body">
              <h5 class="card-title">ALTER EGO</h5>
            </div>
          </div>
          <div class="card bg-transparent">
            <div class="card-img-container">
              <img src="image/team/evos.png" class="card-img-top" alt="EVOS GLORY" />
            </div>
            <div class="card-body">
              <h5 class="card-title">EVOS GLORY</h5>
            </div>
          </div>
          <div class="card bg-transparent">
            <div class="card-img-container">
              <img src="image/team/rrq.png" class="card-img-top" alt="RRQ HOSHI" />
            </div>
            <div class="card-body">
              <h5 class="card-title">RRQ HOSHI</h5>
            </div>
          </div>
          <div class="card bg-transparent">
            <div class="card-img-container">
              <img src="image/team/onic.png" class="card-img-top" alt="ONIC ESPORT" />
            </div>
            <div class="card-body">
              <h5 class="card-title">ONIC ESPORT</h5>
            </div>
          </div>
          <div class="card bg-transparent">
            <div class="card-img-container">
              <img src="image/team/btr.png" class="card-img-top" alt="BIGETRON ALPHA" />
            </div>
            <div class="card-body">
              <h5 class="card-title">BIGETRON ALPHA</h5>
            </div>
          </div>
          <div class="card bg-transparent">
            <div class="card-img-container">
              <img src="image/team/aura.png" class="card-img-top" alt="AURA ESPORT" />
            </div>
            <div class="card-body">
              <h5 class="card-title">AURA ESPORT</h5>
            </div>
          </div>
          <div class="card bg-transparent">
            <div class="card-img-container">
              <img src="image/team/dewa.png" class="card-img-top" alt="DEWA UNITED ESPORT" />
            </div>
            <div class="card-body">
              <h5 class="card-title">DEWA UNITED ESPORT</h5>
            </div>
          </div>
          <div class="card bg-transparent">
            <div class="card-img-container">
              <img src="image/team/rbl.png" class="card-img-top" alt="REBELLION ESPORT" />
            </div>
            <div class="card-body">
              <h5 class="card-title">REBELLION ESPORT</h5>
            </div>
          </div>
          <div class="card bg-transparent">
            <div class="card-img-container">
              <img src="image/team/geek.png" class="card-img-top" alt="GEEK FAM" />
            </div>
            <div class="card-body">
              <h5 class="card-title">GEEK FAM</h5>
            </div>
          </div>
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

    <script src="https://kit.fontawesome.com/4c3afa0530.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

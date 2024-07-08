<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://kit.fontawesome.com/4c3afa0530.js" crossorigin="anonymous"></script>
    <style>
      body {
        font-family: 'Jockey One', sans-serif;
        font-size: 1.2rem;
      }
      .about-us {
        padding: 100px 0;
      }
      .about-us h1 {
        font-size: 3rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 50px;
      }
      .about-us p {
        text-align: center;
        line-height: 1.6;
      }
      .about-us .card {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
      }
      .about-us .first-para {
        margin-bottom: 20px;
      }
    </style>
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
            <li class="nav-item"><a class="nav-link" href="{{ url('team') }}">Team</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ url('aboutUs') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link dashboard-button" href="{{ url('/dashboard') }}">Dashboard</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="hero-section" style="background-image: url('{{ asset('image/background.png') }}');  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;">
      <div class="container">
        <h1 class="text-center" >About Us</h1>
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="card">
              <h2 class="text-center mb-5"><strong>Mobile Legends: Bang Bang Professional League</strong></h2>
              <p class="text-center mb-4">is the largest and most prestigious mobile games competition in Southeast Asia.</p>
              <p class="text-center mb-4">Driven by the determination to elevate the esports ecosystem, in this fourth season, MPL is making the leap by constructing the first franchised-model esports league in Southeast Asia.</p>
              <p class="text-center mb-4">Ensuring the sustainability of the overall community, this franchise model will implement revenue sharing, salary cap, and other special benefits to the participating teams.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer style="margin: 0">
      <div class="container">
        <ul class="d-flex">
          <li class=""><i class="fab fa-facebook-f"></i></li>
          <li><i class="fab fa-instagram"></i></li>
          <li><i class="fab fa-youtube"></i></li>
          <li><i class="fab fa-twitter"></i></li>
          <li><i class="fab fa-tiktok"></i></li>
        </ul>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

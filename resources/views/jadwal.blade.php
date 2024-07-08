<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css" />
    <style>
      body {
        font-family: "Jockey One", sans-serif;
        color: white;
      }

      .schedule-section {
        background-image: url("image/background-pattern.png");
        background-size: cover;
        padding: 100px 0;
        color: white;
      }
      .schedule-header {
        text-align: center;
        margin-bottom: 50px;
      }
      .schedule-container {
        display: flex;
        flex-direction: column;
        gap: 30px;
        align-items: center;
      }
      .schedule-row {
        display: flex;
        justify-content: space-between;
        width: 100%;
        gap: 20px;
      }
      .schedule-day {
        flex: 1;
        margin-bottom: 50px;
      }
      .schedule-day h2 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #fff;
      }
      .match {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: rgba(0, 0, 0, 0.7);
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
      }
      .match img {
        width: 100px;
        height: auto;
      }
      .match-time {
        text-align: center;
        flex-grow: 1;
        margin: 0 20px;
      }
      .match-details {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
      }
      .match-details .team {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .match-details .team img {
        width: 100px;
      }
      footer {
        background-color: rgb(39, 16, 17);
        margin-top: 0rem;
      }
      footer .container {
        height: 100px;
        display: flex;
        align-items: center;
      }
      footer ul {
        margin-bottom: 0;
      }
      footer ul li {
        width: 40px;
        height: 44px;
        text-align: center;
        line-height: 44px;
      }
      footer ul li {
        transition: 0.3s ease;
      }
      footer ul li:hover:nth-child(1) {
        background-color: rgb(59, 89, 152);
      }
      footer ul li:hover:nth-child(2) {
        background-color: rgb(195, 42, 163);
      }
      footer ul li:hover:nth-child(3) {
        background-color: rgb(255, 0, 0);
      }
      footer ul li:hover:nth-child(4) {
        background-color: rgb(29, 161, 242);
      }
      footer ul li:hover:nth-child(5) {
        background-color: rgb(0, 0, 0);
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
            <li class="nav-item"><a class="nav-link active" href="{{ url('jadwal') }}">Schedule</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('statistics') }}">Statistics</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('chat') }}">AI Prediction</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('team') }}">Team</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link dashboard-button" href="{{ url('/dashboard') }}">Dashboard</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="" style="background-image: url('{{ asset('image/background.png') }}');  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;">
      <div class="container">
        <div class="schedule-header">
          <h1>Schedule</h1>
        </div>

        <div class="schedule-container">
          <div class="schedule-row">
            <div class="schedule-day">
              <h2>Wednesday, 5 June 2024</h2>
              <div class="match">
                <div class="match-details">
                  <div class="team">
                    <img src="image/team/geek.png" alt="GEEK FAM" />
                    <p>GEEK FAM</p>
                  </div>
                  <div class="match-time">
                    <p>13.00</p>
                    <p>Playoff Match 1</p>
                  </div>
                  <div class="team">
                    <img src="image/team/rrq.png" alt="RRQ HOSHI" />
                    <p>RRQ HOSHI</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="schedule-day">
              <h2>Wednesday, 5 June 2024</h2>
              <div class="match">
                <div class="match-details">
                  <div class="team">
                    <img src="image/team/aura.png" alt="AURA ESPORTS" />
                    <p>AURA ESPORTS</p>
                  </div>
                  <div class="match-time">
                    <p>18.15</p>
                    <p>Playoff Match 2</p>
                  </div>
                  <div class="team">
                    <img src="image/team/evos.png" alt="EVOS GLORY" />
                    <p>EVOS GLORY</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="schedule-row">
            <div class="schedule-day">
              <h2>Thursday, 6 June 2024</h2>
              <div class="match">
                <div class="match-details">
                  <div class="team">
                    <img src="image/mpl-logo.png" alt="TBD" />
                    <p>TBD</p>
                  </div>
                  <div class="match-time">
                    <p>13.00</p>
                    <p>Playoff Match 3</p>
                  </div>
                  <div class="team">
                    <img src="image/team/onic.png" alt="ONIC ESPORT" />
                    <p>ONIC ESPORT</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="schedule-day">
              <h2>Thursday, 6 June 2024</h2>
              <div class="match">
                <div class="match-details">
                  <div class="team">
                    <img src="image/mpl-logo.png" alt="TBD" />
                    <p>TBD</p>
                  </div>
                  <div class="match-time">
                    <p>18.15</p>
                    <p>Playoff Match 4</p>
                  </div>
                  <div class="team">
                    <img src="image/team/btr.png" alt="BIGETRON ALPHA" />
                    <p>BIGETRON ALPHA</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <ul class="d-flex justify-content-center">
          <li class="me-3"><i class="fa-brands fa-facebook-f"></i></li>
          <li class="me-3"><i class="fa-brands fa-instagram"></i></li>
          <li class="me-3"><i class="fa-brands fa-youtube"></i></li>
          <li class="me-3"><i class="fa-brands fa-twitter"></i></li>
          <li class="me-3"><i class="fa-brands fa-tiktok"></i></li>
        </ul>
      </div>
    </footer>

    <script src="https://kit.fontawesome.com/4c3afa0530.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

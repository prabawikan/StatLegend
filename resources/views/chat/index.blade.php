<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Prediction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://kit.fontawesome.com/4c3afa0530.js" crossorigin="anonymous"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Jockey One', sans-serif;
        }
        .chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .chat-box {
            flex: 1;
            overflow-y: auto;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .chat-message {
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            max-width: 70%;
        }
        .chat-message.user {
            background-color: rgb(39, 16, 17);
            color: white;
            align-self: flex-end;
            font-weight: 100;
        }
        .chat-message.bot {
            background-color: #e2e3e5;
            color: black;
            align-self: flex-start;
        }
        .chat-input {
            display: flex;
            align-items: center;
        }
        .chat-input input {
            flex: 1;
            padding: 15px 30px;
            border: 1px solid #0080ff;
            border-radius: 100px;
            margin-right: 10px;
        }
        .chat-input button {
            padding: 15px 20px;
            border: none;
            border-radius: 100px;
            background-color: rgb(39, 16, 17);
            color: white;
        }
        /* New styles for better formatting */
        .chat-message.bot p {
            margin: 5px 0;
        }
        .chat-message.bot strong {
            display: block;
            margin-top: 10px;
            color: #000;
        }
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
                <li class="nav-item"><a class="nav-link" href="{{ url('statistics') }}">Statistics</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ url('chat') }}">AI Prediction</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('team') }}">Team</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
                <li class="nav-item"><a class="nav-link dashboard-button" href="{{ url('/dashboard') }}">Dashboard</a></li>
            </ul>
        </div>
    </div>
</nav>

<section>
    <div class="chat-container container">
        <div class="chat-box">
            @if(isset($chatHistory))
                @foreach($chatHistory as $chat)
                    <div class="chat-message user">
                        {{ $chat['question'] }}
                    </div>
                    <div class="chat-message bot">
                         {!! nl2br(e($chat['answer'])) !!}
                    </div>
                @endforeach
            @endif
        </div>
        <form method="POST" action="{{ route('chat.send') }}" class="chat-input">
            @csrf
            <input type="text" id="message" name="message" placeholder="Ask your question..." required>
            <button type="submit">Send</button>
        </form>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

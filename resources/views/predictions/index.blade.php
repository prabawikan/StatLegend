<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predictions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahkan gaya kustom jika diperlukan */
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">AI Predictions</a>
        </div>
    </nav>

    <section class="hero-section mt-5 pt-5">
        <div class="container">
            <h1>Predict Team Performance</h1>
            <form method="POST" action="{{ route('predictions.predict') }}" class="mb-3">
                @csrf
                <button type="submit" class="btn btn-primary">Get Predictions</button>
            </form>

            @if(isset($predictions))
                <div class="alert alert-success">
                    <h2>Predictions</h2>
                    <pre>{{ print_r($predictions, true) }}</pre>
                </div>
            @elseif($errors->any())
                <div class="alert alert-danger">
                    <h2>Error</h2>
                    <p>{{ $errors->first('error') }}</p>
                </div>
            @endif
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond */
            font-family: Arial, sans-serif; /* Police par défaut */
        }
        .container {
            margin-top: 50px; /* Espacement du haut */
        }
        .card {
            border: 1px solid #ddd; /* Bordure de la carte */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre */
            padding: 20px; /* Espacement intérieur */
        }
        .card-title {
            text-align: center; /* Centrer le titre */
            margin-bottom: 20px; /* Espacement du bas */
        }
        .form-group {
            margin-bottom: 20px; /* Espacement entre les champs */
        }
        .btn-primary {
            width: 100%; /* Bouton largeur 100% */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <h4 class="card-title">Login</h4>
                    <hr>
                    <form action="{{ route('login_utilisateur') }}" method="post">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" placeholder="Votre Email" name="email" value="{{ old('email') }}">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" placeholder="Votre Password" name="password">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

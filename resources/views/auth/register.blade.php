<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <div style="max-width: 600px; margin: 0 auto;">
        <h2>Inscription</h2>

        <!-- Afficher les erreurs si présentes -->
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
          <br><br>
            <div id="success-message" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
            </div>

            <div>
                <label for="email">Adresse Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="mdp">Mot de Passe</label>
                <input type="password" name="mdp" id="mdp" required>
            </div>

            <div>
                <label for="mdp_confirmation">Confirmer le Mot de Passe</label>
                <input type="password" name="mdp_confirmation" id="mdp_confirmation" required>
            </div>

            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>

<html>
    <body>
        <h1>Bonjour {{ $utilisateur->nom }} !</h1>
        <p>Merci de vous être inscrit sur notre site. Veuillez cliquer sur le bouton ci-dessous pour valider votre compte :</p>
        <a href="{{ $url }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Valider mon compte</a>
    </body>
</html>
